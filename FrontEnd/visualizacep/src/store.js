import { createStore } from 'vuex';

export default createStore({
  state: {
    cepData: null,
    error: null,
  },
  mutations: {
    setCepData(state, data) {
      state.cepData = data;
      state.error = null; // Limpar o erro
    },
    setError(state, error) {
      state.error = error;
      state.cepData = null;
    },
  },
  actions: {
    async fetchCepData({ commit }, cep) {
      try {
        const response = await fetch(`http://localhost:8000/api/cep/${cep}`);
        const data = await response.json();
        if (data.error) {
          commit('setError', data.error);
        } else {
          commit('setCepData', data);
        }
      } catch (error) {
        commit('setError', 'Erro ao buscar dados do CEP');
      }
    },
  },
  getters: {
    cepData: (state) => state.cepData,
    error: (state) => state.error,
  },
});
