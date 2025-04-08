<template>
  <div class="cart-payment">
    <form>
      <CartDataItem>
        <div class="settlement">
          <div class="title__container">
            <div class="title">
              Населенный пункт
            </div>
            <span class="subtitle" style="max-width: 380px">
              Выберите в списке свой город или населенный пункт, 
              где планируете получать заказ.
            </span>
          </div>
          <div class="select-city">
            <SelectAutocomplete
              v-model="city"
              label="Ваш город"
              :items="['Москва', 'Санкт-Петербург']"
              :required="true"
            />
          </div>
        </div>
      </CartDataItem>
      <CartDataItem>
        <div class="delivery">
          <div class="title__container">
            <div class="title">
              Адрес доставки
            </div>
            <span class="subtitle" style="max-width: 194px">
              Доставляем по всему РФ
            </span>
          </div>
          <div class="switch">
            <CartDeliverySwitcher @change="handleDeliveryChange" />
          </div>
        </div>
        <div class="container__delivery">
          
            <SelectAutocomplete
              v-model="street"
              label="Улица, дом"
              :items="['ул. Пушкина, д. 1', 'ул. Пушкина, д. 2']"
              :required="true"
              v-if="activeDelivery !== 'pickup-point'"
            />
            <div class="delivery-type">
              <Select
              v-model="delivery"
              label="Выберите доставку"
              :options="deliveryType"
              :required="true"
              v-if="activeDelivery !== 'pickup-point'"
              :accept="true"
            >
            <template #default="{ option }">
              <div class="selected-delivery">
                <span>
                  {{ option.title }} 
                </span>
                <div class="price">
                  <b>от {{ option.price }} ₽</b>
                  <button type="button">
                    <img :src="InfoIcon" height="17" width="17"/>
                  </button>
                </div>
              </div>
            </template>

            <template #option="{ option }">
              <div class="price-item">
                <span>{{ option.title }}</span>
                <div class="price-item-value">
                  <b>от {{ option.price }} ₽</b>
                <button type="button">
                    <img :src="InfoIcon" height="17" width="17"/>
                </button>
                </div>

              </div>

            </template>

            <template #accept="{ onConfirm }">
              <XSBlueButton text="Подтвердить выбор" height="45px" @click="onConfirm" />
            </template>
            </Select>
    
            </div>

          <div v-if="activeDelivery !== 'pickup-point'" class="apartment">
            <SelectAutocomplete
              v-model="apartment"
              label="Квартира"
              :items="['1', '2', '3']"
              :required="true"
            />
            <SelectAutocomplete
              v-model="gate"
              label="Подъезд"
              :items="['1', '2', '3']"
              :required="true"
            />
            <SelectAutocomplete
              v-model="floor"
              label="Этаж"
              :items="['1', '2', '3']"
              :required="true"
            />
          </div>
          <div v-if="activeDelivery === 'pickup-point'" class="pickup-point">
            <SelectAutocomplete
              v-model="pickup_point"
              label="Выберите пункт выдачи"
              :items="['г. Москва, ул. Кирпичная']"
              :required="true"
            />
            <div class="map">
              <img :src="MapIcon" height="54" width="54" alt="map"/>
              Карта
            </div>
            <div class="point-set">
              <XSBlueButton text="Подтвердить"/>
            </div>
          </div>
        </div>
      </CartDataItem>
      <div class="group">
        <CartDataItem>
        <div class="buyer">
          <div class="title__container">
            <div class="title">
              Форма плательщика
            </div>
            <span class="subtitle" style="max-width: 246px">
              Принимают оплату от физических так и юридических лиц
            </span>
          </div>
          <div class="select-city">
            <Select
              v-model="buyer"
              label="Тип плательщика"
              :options="buyerType"
              :required="true"
              :autocomplete="true"
            />
          </div>
        </div>
      </CartDataItem>
      <CartDataItem>
        <div class="buyer">
          <div class="title__container">
            <div class="title">
              Оплата
            </div>
          </div>
          <div class="select-city">
            <Select
              v-model="payment_method"
              label="Как вы оплатите"
              :options="paymentType"
              :required="true"
              v-if="activeDelivery !== 'pickup-point'"
              :accept="true"
            >
            <template #default="{ option }">
              <div class="selected-delivery">
                <span>
                  {{ option.title }} 
                </span>
       
              </div>
            </template>

            <template #option="{ option }">
              <div class="price-item">
                <span>{{ option.title }}</span>
                <div class="price-item-value">
                <button type="button">
                    <img :src="InfoIcon" height="17" width="17"/>
                </button>
                </div>

              </div>

            </template>

            <template #accept="{ onConfirm }">
              <XSBlueButton text="Подтвердить выбор" height="45px" @click="onConfirm" />
            </template>
            </Select>
          </div>
        </div>
      </CartDataItem>
      </div>
      <CartDataItem>
        <div class="buyer_info">
          <div class="title__container">
            <div class="title">
              Покупатель
            </div>
          </div>
          <div class="buyer-info-container">
            <Input
              v-model="phone"
              label="Номер телефона"
              :required="true"
              type="tel"
            />
            <Input
              v-model="name"
              label="ФИО"
              :required="true"
              type="text"
            />
            <Input
              v-model="email"
              label="Email"
              :required="true"
              type="email"
            />
            <Input
              v-model="comment"
              label="Комментарий"
              :required="false"
              type="text"
            />
          </div>
        </div>
      </CartDataItem>
      <XSBlueButton text="Оплатить" type="submit" class="submit"/>
    </form>
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue"
import MapIcon from "@/assets/icons/cart/mark.svg";
import InfoIcon from "@/assets/icons/cart/info.svg";

import CartDataItem from './CartDataItem.vue';
import CartDeliverySwitcher, { type DeliveryOption } from "./CartDeliverySwitcher.vue";
import SelectAutocomplete from "../common/SelectAutocomplete.vue";
import Input from "../common/Input.vue";
import XSBlueButton from "../common/Buttons/XSBlueButton.vue";
import Select from "../Select.vue";
const city = ref('');
const street = ref('');
const apartment = ref('');
const gate = ref('');
const floor = ref('');
const payment_method = ref<number | string>("nal");
const delivery = ref<number | string>("dalli");
const buyer = ref<number | string>("fiz");
const name = ref('')
const phone = ref('')
const comment = ref('')
const email = ref('')
const pickup_point = ref('')

const activeDelivery = ref('curiour');

function handleDeliveryChange(option: DeliveryOption) {
  activeDelivery.value = option.id; // Сохраняем только id, если тебе нужно
  console.log(activeDelivery.value);
}

const buyerType = [
  {id: "fiz", "title": "Физическое лицо"},
  {id: "jur", "title": "Юридическое лицо"},
]

const paymentType = [
  {id: "nal", "title": "Наличными при получении"},
  {id: "rs", "title": "Переводом на р/с"},
]

const deliveryType = [
  {id: "dalli", "title": "Dalli (Доставка курьером)", "price": 545},
  {id: "del", "title": "Деловые линии", "price": 600},
]

</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.buyer-info-container {
  margin-top: 30px;
}
.title {
  font-weight: 800;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -2%;
  color: #000;
}
.subtitle {
  color: #a0a0a0;
  font-size: 14px;
  line-height: 24px;
  font-weight: 500;
  letter-spacing: 0%;
}
.selected-delivery {
  display: flex;
  align-items: center;
  gap: 34px;
}

.selected-delivery .price {
  display: flex;
  gap: 10px;
  align-items: center;
}

.selected-delivery button, .price-item-value button {
  background: transparent;
  display: flex;
}

.price-item {
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 17px;
}

.price-item span {
  min-width: 211px;
  display: flex;
  align-items: center;
}

.price-item-value {
 display: flex;
 gap: 11px;
 align-items: center;
}

.title__container {
  display: flex;
  flex-direction: column;
  gap: 6px;
}
.settlement {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 30px;
}
.submit {
  width: 100%;
  height: 45px !important;
}
.select-city {
  max-width: 349px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 10px;
}
.select-city:deep(label) {
  max-width: 349px;
}
.apartment {
  width: 100%;
  display: flex;
  gap: 16px;
  align-items: center;
  justify-content: flex-end;
}
.pickup-point {
  width: 100%;
}

.map {
  height: 400px;
  border-radius: 6px;
  border: 1px solid #D9D9D9;
  margin-top: 30px;
  margin-bottom: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #000;
  font-size: 40px;
  font-weight: 700;
}

.point-set:deep(button) {
  width: 228px;
}

.buyer-info-container {
  display: grid;
  grid-template-columns: 2fr 2fr;
  gap: 30px;
}
.apartment:deep(label) {
  max-width: 120px;
}

.delivery {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.container__delivery {
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-content: space-between;
  align-items: flex-start;
  gap: 16px;
  margin-top: 30px;
}

.group {
  display: flex;
  width: 100%;
  gap: 16px;
}

.group:deep(.data-item) {
  width: 100%;
  height: 240px;
}

.buyer {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}

.select-delivery {
  max-width: 100%;
}
.select-delivery:deep(label) {
  max-width: 100%;
}

.delivery-type {
  order: 3;
}

@media (max-width: 1024px) {
  .delivery, .settlement {
    flex-direction: column;
    align-items: flex-start;
  }
  .switch {
    width: 100%;
  }
}
@media (max-width: 992px) {

  .apartment {
    justify-content: flex-start;
  }
  .container__delivery {
    grid-template-columns: 1fr;
  }
  .point-set:deep(button) {
    width: 100%;
  }
  .container__delivery, .group {
    flex-direction: column;
  }

  .buyer-info-container {
    grid-template-columns: auto;
  }

  .group:deep(.data-item) {
    height: auto;
  }

  .buyer {
    gap: 30px;
  }
  .buyer .select-city {
    gap: 10px;
  }
}

@media (max-width: 490px) {
  .apartment {
    flex-direction: column;
    align-items: flex-start;
  }
  .apartment:deep(label) {
    width: 100%;
    max-width: 100%;
  }
  .delivery-type:deep(.select-wrapper) {
    height: 100%;
  }
  .selected-delivery {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
  .delivery-type:deep(.select-wrapper .select-arrow) {
    position: absolute;
    right: 15px;
    top: 15px;
  }
  .buyer-info-container {
    gap: 16px;
  }
  .price-item {
    grid-template-columns: 2fr;
    gap: 0px;
  }
}
</style>