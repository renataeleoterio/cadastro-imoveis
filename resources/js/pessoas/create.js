document.addEventListener('DOMContentLoaded', function() {
    // formatação de cpf
    const cpfInput = document.querySelector('.cpf-input');
    if (cpfInput) {
        cpfInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');

            if (value.length > 11) {
                value = value.substring(0, 11);
            }

            this.value = value
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        });
    }

    // formatação de telefone
    const phoneInput = document.querySelector('.phone-input');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');

            if (value.length > 11) {
                value = value.substring(0, 11);
            }

            this.value = value
                .replace(/(\d{2})(\d)/, '($1) $2')
                .replace(/(\d{5})(\d)/, '$1-$2');
        });
    }

    // validacao antes de enviar formulario
    const form = document.getElementById('pessoa-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Validação adicional pode ser adicionada aqui
            console.log('Formulário validado!');
        });
    }
});
