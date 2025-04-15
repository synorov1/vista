<template>
  <div :class="$style.cartAuth">
    <div :class="$style.form">
      <p :class="$style.title">
        {{ title }}
      </p>
      <form :class="$style[currentStatus]" @submit.prevent="handleSubmit">
        <div v-if="isCodeSent" :class="$style.respond">
          Мы отправили код подтверждения
          на {{ phone }} 
          <button type="button" @click="changePhone">
            Изменить
          </button>
        </div>
        <Input
          v-if="!isCodeSent"
          v-model="phone"
          placeholder="Телефон"
          type="tel"
          :required="true"
          label="Введите ваш номер телефона"
        />
        <Input
          v-if="isCodeSent && (currentStatus === 'call' || currentStatus === 'repeat')" 
          v-model="code"
          placeholder="Код из SMS"
          type="text"
          :required="true"
          label="Введите код"
          :class="[$style.code, { [$style.error]: currentStatus === 'repeat' }]"
          @input="clearError"
        />
        <p v-if="isCodeSent && currentStatus === 'call'" :class="$style.timer">
          Новый код можно получить через <span>{{ timer }}</span> секунд
        </p>
        <XSBlueButton
          :class="[$style.submit, { [$style.error]: currentStatus === 'repeat' }]"
          :text="statusList.find(status => status.status === currentStatus)?.submit || 'Ошибка'"
          height="45px"
        />
        <router-link to="/info/policy" :class="$style.policy">
          Оставляя ваши данные, вы соглашается с политикой конфиденциальности <span>ИП Макарова Елена Валерьевна</span>
        </router-link>
      </form>
    </div>

    <div :class="[$style.status, { [$style.errorStatus]: currentStatus === 'repeat' }]">
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
import { useRouter } from "vue-router";

const router = useRouter();

const statusList = [
  {"status": "keyboard", icon: KeyboardIcon, "submit": "Отправить код"},
  {"status": "call", icon: CallIcon, "submit": "Продолжить"},
  {"status": "repeat", icon: RepeatIcon, "submit": "Отправить еще раз"},
];

const currentStatus = ref("keyboard");
const phone = ref("");
const code = ref("");
const isCodeSent = ref(false);
const timer = ref(321);
let interval: ReturnType<typeof setInterval>;

const handleSubmit = () => {
  if (currentStatus.value === "keyboard") {
    isCodeSent.value = true;
    currentStatus.value = "call";
    startTimer();
  } else if (currentStatus.value === "call") {
    if (code.value === "1234") {
      router.push("/cart/payment");
    } else {
      currentStatus.value = "repeat";
      clearInterval(interval);
    }
  } else if (currentStatus.value === "repeat") {
    clearInterval(interval);
    timer.value = 321;
    currentStatus.value = "call";
    startTimer();
    code.value = "";
  }
};

const startTimer = () => {
  interval = setInterval(() => {
    if (timer.value > 0) {
      timer.value--;
    } else {
      clearInterval(interval);
    }
  }, 1000);
};

const clearError = () => {
  if (currentStatus.value === "repeat") {
    code.value = "";
    currentStatus.value = "call";
  }
};

const changePhone = () => {
  isCodeSent.value = false;
  code.value = "";
  currentStatus.value = "keyboard";
  clearInterval(interval);
  timer.value = 321;
};

onUnmounted(() => {
  clearInterval(interval);
});
</script>

<style module>
.cartAuth {
  border: 1px solid #d9d9d9;
  border-radius: 20px;
  height: 361px;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

form .form {
  max-width: 349px;
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
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
  color: #0084FF;
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

.errorStatus {
  background: #FF4245;
}

.submit {
  min-width: 100%;
}

.submit.error {
  background-color: #0084FF1A;
  color: #0084FF;
}

.error :global(input) {
  border-color: #FF4433;
  color: #FF4433;
}

@media (max-width: 1024px) {
  .status {
    display: none;
  }
}

@media (max-width: 320px) {
  .cartAuth {
    padding: 16px;
  }
}
</style>