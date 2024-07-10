$(document).ready(function() {
    function loadClientes() {
        $.ajax({
            url: 'classes/clienteRead.php',
            method: 'GET',
            success: function(data) {
                $('#clienteList').html(data);
            }
        });
    }

    loadClientes()

    $('#clienteForm').submit(function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'classes/clienteCreateUpdate.php',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                loadClientes();
                $('#clienteForm')[0].reset();
            }
        });
    });

    $('#clienteList').on('click', '.editButton', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'classes/clienteGet.php',
            method: 'GET',
            data: { id: id },
            success: function(data) {
                var cliente = JSON.parse(data);
                $('#id').val(cliente.id);
                $('#nome').val(cliente.nome);
                $('#email').val(cliente.email);
                $('#telefone').val(cliente.telefone);
            }
        });
    });

    $('#deleteButton').click(function() {
        var id = $('#id').val();
        if (id) {
            $.ajax({
                url: 'classes/clienteDelete.php',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    alert(response);
                    loadClientes();
                    $('#clienteForm')[0].reset();
                }
            });
        } else {
            alert('Selecione um cliente para deletar');
        }
    });
});
