import { ref } from 'vue';
import dadata from 'dadata';

const apiKey = import.meta.env.VITE_APP_DADATA_API_KEY; // Используйте переменную окружения для API ключа
const dadataClient = new dadata(apiKey);

export const useDadata = () => {
  const suggestions = ref([]);

  const fetchCities = async (query) => {
    if (query.length > 2) { 
      try {
        const response = await dadataClient.suggest('address', query); // Получаем предложения
        // Фильтруем только города
        suggestions.value = response.suggestions.filter(suggestion => 
          suggestion.data && suggestion.data.city // Проверяем, что это город
        );
      } catch (error) {
        console.error("Ошибка при получении предложений:", error);
        suggestions.value = []; 
      }
    } else {
      suggestions.value = [];
    }
  };

  return { suggestions, fetchCities };
};