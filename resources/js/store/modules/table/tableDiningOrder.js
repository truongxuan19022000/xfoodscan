import axios from 'axios'


export const tableDiningOrder = {
    namespaced: true,
    state: {
        show: {},
        orderItems: {},
        orderBranch: {},
        orderUser: {},
        lastOrder: null,
        lastSlug: null,
    },
    getters: {
        show: function (state) {
            return state.show;
        },
        orderItems: function (state) {
            return state.orderItems;
        },
        orderBranch: function (state) {
            return state.orderBranch;
        },
        orderUser: function (state) {
            return state.orderUser;
        },
        lastOrder: function (state) {
            return state.lastOrder;
        },
        lastSlug: function (state) {
            return state.lastSlug;
        }
    },
    actions: {
        save: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.post("table/dining-order", payload).then((res) => {
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
        show: function (context, payload) {
            return new Promise((resolve, reject) => {
                axios.get(`table/dining-order/show/${payload}`).then((res) => {
                    context.commit("show", res.data.data);
                    context.commit("orderItems", res.data.data.order_items);
                    context.commit("orderBranch", res.data.data.branch);
                    context.commit("orderUser", res.data.data.user);
                    context.commit("lastOrder", res.data.data.id);
                    context.commit("lastSlug", res.data.data.slug);
                    resolve(res);
                }).catch((err) => {
                    reject(err);
                });
            });
        },
    },
    mutations: {
        show: function (state, payload) {
            state.show = payload;
        },
        orderItems: function (state, payload) {
            state.orderItems = payload;
        },
        orderBranch: function (state, payload) {
            state.orderBranch = payload;
        },
        orderUser: function (state, payload) {
            state.orderUser = payload;
        },
        lastOrder: function (state, payload) {
            state.lastOrder = payload;
        },
        lastSlug: function (state, payload) {
            state.lastSlug = payload;
        }
    },
}
