<template>
  <div class="reklama-container col-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
    <div class="reklama">
      <div class="reklama-text">Нет времени искать</div>
      <div class="reklama-description">
        Оставьте ваш номер телефона, наш специалист свяжется с вами в течение 15 минут и поможет с выбором
      </div>
      <div class="phone-number">Номер телефона</div>
      <div class="btn-reklama">
        <div class="btn-reklama-text">+7</div>
      </div>
      <div class="btn">
        <div class="btn-text">Оставить заявку</div>
      </div>
      <div class="reklama-policy">
        Оставляя ваши данные, вы соглашаетесь с политикой конфиденциальности ИП Макарова Елена Валерьевна
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.reklama-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  margin-bottom: 19px;
}

.reklama {
  background-color: var(--blue-400-color);
  border-radius: 16px;
  padding: 2rem;
  position: relative;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;
  height: 100%;
}

.reklama-text,
.reklama-description,
.phone-number,
.reklama-policy {
  width: 100%;
  padding: 0 1rem;
  box-sizing: border-box;
}

.reklama-text {
  font-weight: 800;
  font-size: 24px;
  line-height: 30px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  margin-bottom: 1rem;
}

.reklama-description {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  margin-bottom: 1rem;
}

.phone-number {
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
  margin-bottom: 1rem;
}

.btn-reklama {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 14px;
  gap: 10px;
  width: 100%;
  height: 45px;
  background-color: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(15px);
  border-radius: 6px;
  margin-bottom: 1rem;
}

.btn-reklama-text {
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
}

.btn {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  width: 100%;
  height: 45px;
  background-color: var(--white-color);
  border-radius: 6px;
  margin-bottom: 1rem;
}

.btn-text {
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.reklama-policy {
  font-weight: 400;
  font-size: 12px;
  line-height: 16px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  text-align: left;
}

@media (min-width: 768px) {
  .reklama-container {
    margin: 0;
  }
}

@media (min-width: 1024px) {
  .reklama-text {
    font-size: 34px;
    line-height: 41px;
    margin-bottom: 1rem;
  }

  .reklama-description {
    font-size: 18px;
    line-height: 26px;
    margin-bottom: 1rem;
  }

  .phone-number {
    font-size: 14px;
    line-height: 17px;
    margin-bottom: 1rem;
  }

  .btn-reklama {
    width: 100%;
    height: 50px;
    background-color: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px);
    border-radius: 6px;
    margin-bottom: 1rem;
  }

  .btn-reklama-text {
    font-size: 14px;
    line-height: 17px;
    color: var(--white-color);
  }

  .btn {
    width: 100%;
    height: 50px;
    background-color: var(--white-color);
    border-radius: 6px;
    margin-bottom: 1rem;
  }

  .btn-text {
    font-size: 14px;
    line-height: 17px;
    color: var(--black-color);
  }

  .reklama-policy {
    font-size: 14px;
    line-height: 17px;
    text-align: left;
  }
}

@media (min-width: 1440px) {
  .reklama {
    background-color: var(--blue-400-color);
    border-radius: 20px;
    padding: 2rem;
  }

  .reklama-text {
    font-size: 34px;
    line-height: 41px;
    margin-bottom: 1rem;
  }

  .reklama-description {
    font-size: 18px;
    line-height: 26px;
    margin-bottom: 1rem;
  }

  .phone-number {
    font-size: 14px;
    line-height: 17px;
    margin-bottom: 1rem;
  }

  .btn-reklama {
    width: 100%;
    height: 50px;
    background-color: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(15px);
    border-radius: 6px;
    margin-bottom: 1rem;
  }

  .btn-reklama-text {
    font-size: 14px;
    line-height: 17px;
    color: var(--white-color);
  }

  .btn {
    width: 100%;
    height: 50px;
    background-color: var(--white-color);
    border-radius: 6px;
    margin-bottom: 1rem;
  }

  .btn-text {
    font-size: 14px;
    line-height: 17px;
    color: var(--black-color);
  }

  .reklama-policy {
    font-size: 14px;
    line-height: 17px;
    text-align: left;
    max-width: 451px;
    align-self: flex-start;
    padding: 0;
  }
}
</style>
