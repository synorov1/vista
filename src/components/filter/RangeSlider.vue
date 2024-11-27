<template>
    <div class="price-inputs">
        <div class="indent">
            <input type="number" class="price-input" :placeholder="`от ${min} ₽`" :value="minValue" @input="changeMin" />
        </div>
        <div class="indent">
            <input type="number" class="price-input" :placeholder="`до ${max} ₽`" :value="maxValue" @input="changeMax" />
        </div>
    </div>
    <div class="range-slider">
        <input type="range" class="range-input" ref="minInput" v-model="minValue" :min="min" :max="maxValue" />
        <input type="range" class="range-input" ref="maxInput" v-model="maxValue" :min="minValue" :max="max" />
    </div>
</template>

<script setup lang="ts">
import { toRefs, watch } from 'vue';

const props = defineProps({
    min: {
        type: Number,
        default: 0,
    },
    max: {
        type: Number,
        default: 10000000,
    },
    minValue: {
        type: Number,
        required: true,
    },
    maxValue: {
        type: Number,
        required: true,
    },
})
const emits = defineEmits(['update:minValue', 'update:maxValue'])

const { min, max, minValue, maxValue } = toRefs(props);

watch(() => maxValue.value, () => {
    if (maxValue.value > max.value) {
        maxValue.value = max.value;
    }
    if (maxValue.value < minValue.value) {
        maxValue.value = minValue.value + 1;
    }
})
watch(() => minValue.value, () => {
    if (minValue.value < min.value) {
        minValue.value = max.value;
    }
    if (minValue.value > maxValue.value) {
        minValue.value = maxValue.value - 1;
    }
})

const changeMax = (value: Event) => {
    emits('update:maxValue', value);
}

const changeMin = (value: Event) => {
    emits('update:minValue', value);
}


</script>

<style scoped></style>