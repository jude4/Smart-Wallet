import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user: null,
        posts: null
    },

    mutations: {
        SET_USER_DATA (state, userData) {
            state.user = userData
            localStorage.setItem('user', JSON.stringify(userData))
            axios.defaults.headers.common['Authorization'] = `Bearer ${
                userData.token
            }`
        },

        CLEAR_USER_DATA () {
            localStorage.removeItem('user')
            location.reload()
        } 


    },
    actions: {
        register ({ commit }, credentials) {
            return axios
                .post('/api/register', credentials)
                .then(({data}) => {
                  commit('SET_USER_DATA',data)
                })
        },

        login ( {commit}, credentials ) {
            return axios
                .post('/api/login', credentials)
                .then(({ data }) => {
                    commit('SET_USER_DATA', data)
                })
        },


        logout ({ commit }) {
            commit('CLEAR_USER_DATA')
        }


    },

    getters: {
        loggedIn (state) {
            return !!state.user
        }
    }
})

export default store