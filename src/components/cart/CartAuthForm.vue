<template>
  <div class="cart-auth">

    <div class="form">
      <p class="title">{{ title }}</p>
      <form @submit.prevent="handleSubmit" :class="currentStatus">
        <div v-if="isCodeSent" class="respond">
          Мы отправили код подтверждения
          на {{ phone }} 
          <button type="button" @click="changePhone">
            Изменить
          </button>
        </div>
        <Input
          v-if="!isCodeSent"
          placeholder="Телефон"
          type="tel"
          :required="true"
          label="Введите ваш номер телефона"
          v-model="phone"
        />
        <Input
        v-if="isCodeSent && (currentStatus === 'call' || currentStatus === 'repeat')" 
          placeholder="Код из SMS"
          type="text"
          :required="true"
          label="Введите код"
          v-model="code"
          class="code"
:class="{ error: currentStatus === 'repeat' }"
  @input="clearError"
        />
        <p v-if="isCodeSent && currentStatus === 'call'" class="timer">
          Новый код можно получить через <span>{{ timer }}</span> секунд
        </p>
        <XSBlueButton
          class="submit"
          :class="{error: currentStatus === 'repeat'}"
          :text="statusList.find(status => status.status === currentStatus)?.submit || 'Ошибка'"
          height="45px"
        />
        <router-link to="/info/policy" class="policy">
          Оставляя ваши данные, вы соглашается с политикой конфиденциальности <span>ИП Макарова Елена Валерьевна</span>
        </router-link>
      </form>
    </div>

    <div class="status" :class="{ 'error_status': currentStatus === 'repeat' }">
      <img
        :src="statusList.find(status => status.status === currentStatus)?.icon || ''"
        alt="Status"
        height="163"
        width="163"
      >
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onUnmounted } from "vue";
import Input from "../common/Input.vue";
const title = ref("Авторизация")
import KeyboardIcon from "@/assets/icons/cart/keyboard.svg"
import CallIcon from "@/assets/icons/cart/call.svg"
import RepeatIcon from "@/assets/icons/cart/repeat.svg"
import XSBlueButton from "../common/Buttons/XSBlueButton.vue";
import { useRouter } from "vue-router"; // Импортируем useRouter

const router = useRouter(); // Создаем экземпляр router

const statusList = [
  {"status": "keyboard", icon: KeyboardIcon, "submit": "Отправить код"},
  {"status": "call", icon: CallIcon, "submit": "Продолжить"},
  {"status": "repeat", icon: RepeatIcon, "submit": "Отправить еще раз"},
];

const currentStatus = ref("keyboard");
const phone = ref("");
const code = ref("");
const isCodeSent = ref(false);
const timer = ref(321); // Начальное значение таймера
let interval: ReturnType<typeof setInterval>; // Переменная для хранения интервала
  const handleSubmit = () => {
  if (currentStatus.value === "keyboard") {
    isCodeSent.value = true;
    currentStatus.value = "call";
    startTimer(); // Запускаем таймер при отправке кода
  } else if (currentStatus.value === "call") {
    if (code.value === "1234") { // Проверка правильности кода
      // Логика для успешного ввода кода
      router.push("/cart/payment");
    } else {
      currentStatus.value = "repeat"; // Меняем статус на repeat
      clearInterval(interval); // Убираем таймер
      // Убираем установку неверного кода в Input
    }
  } else if (currentStatus.value === "repeat") { // Обработка нажатия на "Отправить еще раз"
    clearInterval(interval); // Останавливаем текущий таймер
    timer.value = 321; // Сбрасываем таймер
    currentStatus.value = "call"; // Меняем статус на call
    startTimer(); // Запускаем таймер заново
    code.value = ""; // Очищаем поле ввода
  }
};
const startTimer = () => {
  interval = setInterval(() => {
    if (timer.value > 0) {
      timer.value--;
    } else {
      clearInterval(interval); // Останавливаем таймер, когда время истекло
    }
  }, 1000); // Обновляем каждую секунду
};
const clearError = () => {
  if (currentStatus.value === "repeat") {
    code.value = ""; // Очищаем поле ввода
    currentStatus.value = "call"; // Меняем статус обратно на call
  }
};
const changePhone = () => {
  isCodeSent.value = false;
  code.value = ""; 
  // phone.value = "";
  currentStatus.value = "keyboard"; 
  clearInterval(interval);
  timer.value = 321; 
};

onUnmounted(() => {
  clearInterval(interval); // Останавливаем таймер при размонтировании компонента
});
</script>

<style scoped>
.cart-auth {
  border: 1px solid #d9d9d9;
  border-radius: 20px;
  height: 361px;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

form, .form {
  max-width: 349px;
  width: 100%;
  display: flex;
  flex-direction: column;

}

form {
    gap: 16px;
    }

    form.call {
    gap: 10px;
    }
.title {
  color: #000;
  font-size: 24px;
  font-weight: 800;
  letter-spacing: -2%;
  line-height: 100%;
  margin-bottom: 0;
}

.form {
  justify-content: space-between;
  height: 100%;

}

.respond {
  color: #000;
  font-size: 14px;
  font-weight: 400;
  line-height: 22px;
  margin-bottom: 0;
}

.respond button {
  background: transparent;
  border: unset;
  color: #0084FF;
  text-decoration: underline;
}
.timer {
  font-size: 14px;
  line-height: 22px;
  color: #000;
  font-weight: 400;
  margin-bottom: 0;
}

.timer span {
  color: #0084FF
}

.policy {
  font-weight: 400;
  font-size: 12px;
  line-height: 100%;
  color: #000;

}

.policy span {
  text-decoration: underline;
}

.status {
  width: 201px;
  height: 301px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #F5F6FA;
  border-radius: 20px;
}

.error_status {
  background: #FF4245;
}

.submit {
  min-width: 100%;
}

.submit.error {
  background-color: #0084FF1A;
  color: #0084FF;
}

.error:deep(input) {
  border-color: #FF4433;
  color: #FF4433;
}

@media (max-width: 1024px) {
  .status {
    display: none;
  }
}

@media (max-width: 320px) {
  .cart-auth {
    padding: 16px;
  }
}

</style>