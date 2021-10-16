
export default {
    updatePass: function (formData) {
        return axios.post('/modificar-senha', formData)
    },
}
