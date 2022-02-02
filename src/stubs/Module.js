export const namespaced = true;

export const state = {
    test: null,
};

export const mutations = {
    SET_TEST(state, payload) {
        state.test = payload;
    },
};

export const actions = {
    async setTest({ commit }, payload) {
        try {
            commit("SET_TEST", payload);
        }catch(error) {
            commit("SET_TEST", null);
        }
    },
};

export const getters = {
    test: (state) => {
        return state.test;
    },
};