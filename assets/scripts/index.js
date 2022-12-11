var validator = null;

async function feedbackFormClick() {
    if (this.validator === null) return false;
    if (!this.validator.hasError() === true) {
        document.getElementsByClassName('feedbackForm')[0]?.classList.add('loading')
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('gift', document.getElementById('gift').value);
        let response = await fetch('/api/feedback', {
            method: 'POST',
            body: formData
        });
        response = await response.json();
        document.getElementsByClassName('feedbackForm')[0]?.classList.remove('loading')
        
        if(response.status === 'ok'){
            alert('Запись успешно зарегистрирована');
        }else{
            alert(response.message);
        }
    }
}

document.addEventListener("DOMContentLoaded", () => {
    this.validator = new Validation();
    new Scroll('smooth');
    document.querySelectorAll('form [check]').forEach(e => {
        this.validator.appendField(e, e.getAttribute('event'));
    })
    let rightsField = document.getElementById('rules');
    this.validator.appendField(rightsField, 'click', () => !rightsField.checked);
    this.validator.start();

});