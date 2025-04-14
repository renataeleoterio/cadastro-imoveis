import 'bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    // confirmação antes de excluir
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Tem certeza que deseja excluir esta pessoa?')) {
                e.preventDefault();
            }
        });
    });

    // formatar cpf
    const cpfElements = document.querySelectorAll('.cpf');
    cpfElements.forEach(el => {
        const cpf = el.textContent.trim();
        if (cpf.length === 11) {
            el.textContent = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }
    });
});
