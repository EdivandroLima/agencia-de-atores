
export default {
    create: function (formData) {
        return axios.post('/assistente', formData);
    },
    all: function () {
        return axios.get('/assistentes')
    },
    delete: function (id) {
        return axios.delete('/assistente/' + id)
    },
}
