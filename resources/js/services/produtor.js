
export default {
    create: function (formData) {
        return axios.post('/produtores', formData);
    },
    all: function () {
        return axios.get('/produtores')
    },
    delete: function (id) {
        return axios.delete('/produtores/' + id)
    },
    updateProducer: function (formData, id) {
        return axios.post('/produtores/' + id, formData)
    },
    enviarEmail: function (formData) {
        return axios.post('/produtores/enviar-email', formData)
    },
}
