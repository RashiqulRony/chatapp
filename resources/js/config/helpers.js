import store from "../store";

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

export function imagePreview($event, elementID, imgFor) {
    let image = document.getElementById(elementID).files[0];
    if (image !== undefined) {
        if (image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/webp' || image.type === 'image/gif') {
            let reader = new FileReader();
            reader.onload = function () {
                let data = {
                    image: reader.result,
                    image_for: imgFor,
                }
                store.dispatch('imgPreview', data)
            }
            reader.readAsDataURL(event.target.files[0]);
        } else {
            alert('This file is not an image')
        }
    }
}


