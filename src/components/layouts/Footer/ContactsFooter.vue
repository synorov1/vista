<template>
  <div class="reklama-container col-12 col-md-6 col-lg-6 col-xl-6 mx-auto">
    <div class="reklama">
      <div class="logo text-center">
        <img src="@/assets/images/logo.png" alt="Logo" class="img-fluid" />
      </div>
      <div class="contact-info text-left">
        <div class="free-call mb-2">Бесплатно по России</div>
        <a href="tel:+88002342420" class="phone mb-2">8 (800) 234-24-20</a>
        <div class="email-info mb-2">Почта для связи</div>
        <a href="mailto:info@vistasport.ru" class="email mb-2">info@vistasport.ru</a>
        <div class="login-button mb-3">
          <button class="btn btn-primary">Войти</button>
        </div>
        <div class="social-media-text mb-2">Социальные сети</div>
        <div class="social-media-icons d-flex justify-content-start mb-3 mt-3">
          <a href="https://www.youtube.com" target="_blank" class="social-icon">
            <img src="@/assets/icons/youtube.svg" alt="YouTube" />
          </a>
          <a href="https://www.telegram.com" target="_blank" class="social-icon">
            <img src="@/assets/icons/telegram.svg" alt="Telegram" />
          </a>
          <a href="https://www.vk.com" target="_blank" class="social-icon">
            <img src="@/assets/icons/vk.svg" alt="VK" />
          </a>
        </div>
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
}

.reklama {
  background-color: var(--white-color);
  border: 1px solid var(--gray-400-color);
  border-radius: 16px;
  padding: 2rem;
  position: relative;
  text-align: left;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  flex: 1;
  height: 100%;
}

.logo img {
  width: 165px;
  height: 37px;
  margin-bottom: 1rem;
}

.contact-info {
  width: 100%;
  text-align: left;
}

.contact-info a {
  text-decoration: none;
  color: var(--black-color);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  display: flex;
}

.free-call, .email-info, .social-media-text {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 30px;
  letter-spacing: -0.02em;
  color: var(--gray-600-color);
}

.social-media-icons {
  gap: 14px;
}

.social-icon {
  width: 45px;
  height: 45px;
  background-color: rgba(0, 132, 255, 0.1);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
}

.social-icon img {
  width: 24px;
  height: 24px;
  display: block;
}

.login-button {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  background-color: var(--gray-300-color);
  border-radius: 6px;
}

.login-button button {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  background-color: transparent;
  border: none;
}

@media (min-width: 768px) {

  .logo img {
    width: 200px;
    height: 45px;
  }

  .contact-info a {
    font-size: 28px;
    line-height: 34px;
  }

  .free-call, .email-info, .social-media-text {
    font-size: 16px;
    line-height: 34px;
  }

  .social-icon {
    width: 55px;
    height: 55px;
  }

  .social-icon img {
    width: 30px;
    height: 30px;
  }

  .login-button button {
    font-size: 16px;
    line-height: 20px;
  }
}

@media (min-width: 1024px) {
  .reklama {
    border-radius: 20px;
  }

  .logo img {
    width: 165px;
    height: 37px;
    margin-bottom: 1.5rem;
  }

  .contact-info a {
    font-size: 34px;
    line-height: 41px;
  }

  .free-call, .email-info, .social-media-text {
    font-size: 18px;
    line-height: 30px;
  }

  .social-icon {
    width: 45px;
    height: 45px;
  }

  .social-icon img {
    width: 24px;
    height: 24px;
  }

  .login-button {
    width: 140px;
    height: 50px;
    padding: 14px;
    gap: 10px;
    background-color: var(--gray-300-color);
    border-radius: 6px;
  }

  .login-button button {
    font-size: 14px;
    line-height: 17px;
  }
}

@media (min-width: 1440px) {

  .logo img {
    width: 165px;
    height: 37px;
    margin-bottom: 1.5rem;
  }

  .contact-info a {
    font-size: 34px;
    line-height: 41px;
  }

  .free-call, .email-info, .social-media-text {
    font-size: 18px;
    line-height: 30px;
  }

  .social-icon {
    width: 45px;
    height: 45px;
  }

  .social-icon img {
    width: 24px;
    height: 24px;
  }

  .login-button {
    width: 140px;
    height: 50px;
    padding: 14px;
    gap: 10px;
    background-color: var(--gray-300-color);
    border-radius: 6px;
  }

  .login-button button {
    font-size: 14px;
    line-height: 17px;
  }
}

.reklama {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.social-media-icons {
  margin-top: auto;
  margin-bottom: 2rem;
}
</style>
