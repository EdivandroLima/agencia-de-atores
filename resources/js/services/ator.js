
export default {
    create: function (formData) {
        return axios.post('/atores', formData);
    },
    search: function (queryString) {
        return axios.get('/atores' + queryString);
    },
    delete: function (id) {
        // return axios.delete('/atores/' + id)
    },
    update: function (formData, id) {
        // return axios.post('/atores/' + id, formData)
    },
}
