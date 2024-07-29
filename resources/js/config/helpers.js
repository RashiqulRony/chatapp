export function toastr(type, message) {
    if (type === 'success') {
        return this.$toast.success(message, {
            position: 'top-right'
        })
    } else if (type === 'error') {
        return this.$toast.error(message, {
            position: 'top-right'
        })
    } else if (type === 'warning') {
        return this.$toast.warning(message, {
            position: 'top-right'
        })
    } else if (type === 'info') {
        return this.$toast.info(message, {
            position: 'top-right'
        })
    } else {
        return this.$toast.default(message, {
            position: 'top-right'
        })
    }
}
