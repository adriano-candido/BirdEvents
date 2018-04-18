function inscrevase(evento) {
    $.post("", {
        acao: "inscrevase",
        evento: evento
    }, function (data) {
        Materialize.toast(data, 4000);
    });
}


//Consulta por POST com retorno
$('form').submit(function () {
    $.post("", $(this).serialize(), function (data) {
        //     Materialize.toast(data, 10000);

    });

    return; //false;
});

// Alterna as marcações das permissões
$('input[name="grupoDePermissoes"]').on('click', function () {
    var _this = this;
    var checkboxes = $('input[name="permissoes[]"]');

    for (var index = 0, tamanho = checkboxes.length; index < tamanho; index++) {
        var checkbox = checkboxes[index];

        if (checkbox.value.includes(_this.value)) {
            checkbox.checked = _this.checked;
        }
    }
});


$('input[name="permissoes[]"]').on('click', function () {
    var _this = this;
    var checkboxes = $('input[name="grupoDePermissoes"]');

    for (var index = 0, tamanho = checkboxes.length; index < tamanho; index++) {
        var checkbox = checkboxes[index];

        if (checkbox.value.includes(_this.value.split('.')[0])) {
            if (!_this.checked) {
                checkbox.checked = false;
            }
        }
    }
});

// Altera os campos do formulário do participante conforme o tipo de acesso
$("input[name='tipoCertificado']").click(function () {
    if (this.value === "digital") {
        $("#blocoCertificadoFisico").hide(1000);
        $("#blocoCertificadoDigital").show(1000);
    } else if (this.value === "fisico") {
        $("#blocoCertificadoDigital").hide(1000);
        $("#blocoCertificadoFisico").show(1000);
    }

});

// Altera os campos do formulário do participante conforme o tipo de acesso
$("input[name='tipoacesso']").click(function () {
    permissoesPorUsuario(this.value);
    if (this.value === "aluno") {
        $("#blocoprofessor").hide(1000);
        $("#blocoaluno").show(1000);
    } else if (this.value === "professor") {
        $("#blocoaluno").hide(1000);
        $("#blocoprofessor").show(1000);
    } else {
        $("#blocoaluno").hide(1000);
        $("#blocoprofessor").hide(1000);
    }

});

$("input[name='tipoprojeto']").click(function () {
    alternaTipoProjetos(this.value);
});

function alternaTipoProjetos(tipoProjeto) {
    if (tipoProjeto === "institucional") {
        $("#blococurso").show(1000);
        $("#blocosetor").hide(1000);
    } else if (tipoProjeto === "curso") {
        $("#blococurso").show(1000);
        $("#blocosetor").hide(1000);
    } else {
        $("#blococurso").hide(1000);
        $("#blocosetor").show(1000);
    }
}

$("form[name='form_certificado']").submit(function () {
    var tipoDeCertificado = $("input[name='tipoCertificado']").val();
    if (tipoDeCertificado.length > 1) {
        tipoDeCertificado = $("input[name='tipoCertificado']:checked").val();
    }
    var anoExercicio = $("select[name='anoExercicio'] option:selected").val();
    var imagemSelecionada = $("input[name='imagem']").val();
    
    $("textarea[name='texto']").val((nicEditors.findEditor('textarea')).getContent());

    var textoCertificado = $("textarea[name='texto']").val();
    var imagemAtual = $("#imagemAtual").attr('src');


    if (tipoDeCertificado == "fisico" && anoExercicio == "") {

        Materialize.toast("Selecione um Ano de Exercício.", 4000);

        return false;

    } else if (tipoDeCertificado == "digital") {
        
        if (textoCertificado == "") {
            Materialize.toast("Informe um Texto para o certificado.", 4000);
            return false;
        }

        if (imagemSelecionada == "" && imagemAtual == undefined) {
            Materialize.toast("Selecione uma Imagem.", 4000);
            return false;
        }
    }
});

$("form[name='form_projeto']").submit(function () {
    var tipoDeProjeto = $("input[name='tipoprojeto']:checked").val();
    var qtdCursosMarcados = $("input[name='curso[]']:checked").length;
    var setorMarcado = $("select[name='setor'] option:selected").val();
    if (tipoDeProjeto == "institucional" && qtdCursosMarcados < 4) {

        Materialize.toast("Para ser Institucional <br> Selecione no mínimo 4 cursos.", 4000);

        return false;
    } else if (tipoDeProjeto == "curso" && qtdCursosMarcados < 1) {
        Materialize.toast("Selecione no mínimo 1 curso.", 4000);

        return false;
    } else if (tipoDeProjeto == "outros" && setorMarcado == "") {
        Materialize.toast("Selecione um setor.", 4000);
        return false;
    }

});

$("form[name='form_usuario']").submit(function () {
    var permissoes = $('input[name="permissoes[]"]:checked').length
    if (permissoes < 1) {
        Materialize.toast("Selecione no mínimo 1 permissão.", 4000);
        return false;
    }

});

// Alterna as opções disponíveis de acordo com a quantidade de itens selecionados no checkbox
$('input:checkbox').on('change', function () {
    var checkbox = $('input:checkbox:checked');
    //verifica se existem checkbox selecionados


    if (checkbox.length < 1) {
        $('#visualizar').attr('disabled', 'disabled');
        $('#editar').attr('disabled', 'disabled');
        $('#desvincular').attr('disabled', 'disabled');
        $('#vinculados').attr('disabled', 'disabled');
        $('#excluir').attr('disabled', 'disabled');
    } else if (checkbox.length > 1) {
        $('#visualizar').attr('disabled', 'disabled');
        $('#editar').attr('disabled', 'disabled');
        $('#desvincular').removeAttr('disabled', 'disabled');
        $('#vinculados').attr('disabled', 'disabled');
        $('#excluir').removeAttr('disabled', 'disabled');
    } else {
        $('#visualizar').removeAttr('disabled', 'disabled');
        $('#editar').removeAttr('disabled', 'disabled');
        $('#desvincular').removeAttr('disabled', 'disabled');
        $('#vinculados').removeAttr('disabled', 'disabled');
        $('#excluir').removeAttr('disabled', 'disabled');
    }
});

$('input:checkbox').on('change', checarVincular);
$('input:radio').on('change', checarVincular);


function checarVincular() {
    var checkbox = $('input:checkbox:checked');
    var radio = $('input:radio[name="indexCertificado"]:checked');

    if (checkbox.length < 1 || radio.length < 1) {
        $('#vincular_certificado').attr('disabled', 'disabled');
    } else {
        $('#vincular_certificado').removeAttr('disabled', 'disabled');
    }

    if (radio.length !== 1) {
        $('#vincular_arquivo').attr('disabled', 'disabled');
    } else {
        $('#vincular_arquivo').removeAttr('disabled', 'disabled');
    }
}

$("input[name='abrirInscricao']").click(
        function () {
            verificaAbrirInscricao($(this));
        }
);

function verificaAbrirInscricao(checkbox) {
    if ($(checkbox).is(':checked')) {
        $('#blocoInscricao').show(1000);
    } else {
        $('#blocoInscricao').hide(1000);
    }
}

// Inicializadores de objetos
$(document).ready(function () {
    $('.button-collapse').sideNav();

    $('select').material_select();

    $('.tooltipped').tooltip({delay: 50});

    $('.slider').slider();

    $('.modal').modal();

    $('.datepicker').pickadate({
        monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádo'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Pronto',
        labelMonthNext: 'Próximo mês',
        labelMonthPrev: 'Mês anterior',
        labelMonthSelect: 'Selecione um mês',
        labelYearSelect: 'Selecione um ano',
        selectMonths: true,
        selectYears: 15,
        format: 'dd-mmmm-yyyy',
        closeOnSelect: true
    });

    $('.cpf').mask('000.000.000-00', {reverse: false});

    $('.cpf').blur(function () {
        if (!validarCPF($(this).val())) {
            Materialize.toast("CPF Inválido", 4000);
            // $(this).val('');
        }
    });

    alternaTipoProjetos($("input[name='tipoprojeto']:checked").val());

    verificaAbrirInscricao($("input[name='abrirInscricao']"));

    $.getScript("js/permissoes.js");
});

function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '')
        return false;
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
        return false;
    // Valida 1o digito 
    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito 
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}



 