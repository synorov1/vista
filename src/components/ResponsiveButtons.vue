<template>
  <div>
    <select v-if="isMobile" v-model="selectedOption">
      <option v-for="option in options" :key="option.value" :value="option.value">
        {{ option.label }}
      </option>
    </select>
    <div v-else>
      <button v-for="option in options" :key="option.value" @click="handleClick(option.value)">
        <i :class="option.icon"></i> {{ option.label }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isMobile: window.innerWidth < 720,
      selectedOption: null,
      options: [
        { value: 'option1', label: 'Option 1', icon: 'icon-class-1' },
        { value: 'option2', label: 'Option 2', icon: 'icon-class-2' },
        { value: 'option3', label: 'Option 3', icon: 'icon-class-3' },
      ],
    };
  },
  methods: {
    handleClick(value) {
      this.selectedOption = value;
    },
  },
  mounted() {
    window.addEventListener('resize', this.checkWindowSize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.checkWindowSize);
  },
  methods: {
    checkWindowSize() {
      this.isMobile = window.innerWidth < 720;
    },
  },
};
</script>

<style scoped>
button {
  margin-right: 10px;
}
</style>
