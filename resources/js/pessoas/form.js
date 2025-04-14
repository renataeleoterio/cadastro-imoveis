// formatação do cpf
const formatCPF = (input) => {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 11) value = value.substring(0, 11);
    input.value = value
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
};

// formatação de telefone
const formatPhone = (input) => {
    let value = input.value.replace(/\D/g, '');
    if (value.length > 11) value = value.substring(0, 11);
    input.value = value
        .replace(/(\d{2})(\d)/, '($1) $2')
        .replace(/(\d{5})(\d)/, '$1-$2');
};

// aplicação dos eventos
document.addEventListener('DOMContentLoaded', function() {
    // cpf
    document.querySelectorAll('.cpf-input').forEach(input => {
        input.addEventListener('input', () => formatCPF(input));
    });

    // telefone
    document.querySelectorAll('.phone-input').forEach(input => {
        input.addEventListener('input', () => formatPhone(input));
    });

    // validação do formulário
    const form = document.getElementById('pessoa-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            console.log('Formulário validado!');
        });
    }
});
