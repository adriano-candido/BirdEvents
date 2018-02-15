var permissoes = {
    'admin': [
        'Aluno.Edição.0',
        'Aluno.Pesquisa.1',
        'Aluno.Visualização.0',
        'Certificado.Cadastro.1',
        'Certificado.Edição.0',
        'Certificado.Pesquisa.1',
        'Certificado.Visualização.0',
        'Certificado.Visualização_Geral.0',
        'Certificado.Vinculados.0',
        'Certificado.Pesquisa_Por_Usuário.1',
        'Certificado.Vincular_Certificados.1',
        'Curso.Cadastro.1',
        'Curso.Edição.0',
        'Curso.Pesquisa.1',
        'Curso.Visualização.0',
        'Professor.Edição.0',
        'Professor.Pesquisa.1',
        'Professor.Visualização.0',
        'Projeto.Cadastro.1',
        'Projeto.Edição.0',
        'Projeto.Pesquisa.1',
        'Projeto.Visualização.0',
        'Projeto.Visualização_Geral.0',
        'Projeto.Avaliar.0',
        'Projeto.Exclusão.0',
        'Setor.Cadastro.1',
        'Setor.Edição.0',
        'Setor.Pesquisa.1',
        'Setor.Visualização.0',
        'Usuário.Cadastro.1',
        'Usuário.Edição.0',
        'Usuário.Pesquisa.1',
        'Usuário.Visualização.0',
        'Usuário.Exclusão.0',
        'Visitante.Edição.0',
        'Visitante.Pesquisa.1',
        'Visitante.Visualização.0'
    ],
    'funcionario': [
        'Aluno.Edição.0',
        'Aluno.Pesquisa.1',
        'Aluno.Visualização.0',
        'Certificado.Cadastro.1',
        'Certificado.Edição.0',
        'Certificado.Pesquisa.1',
        'Certificado.Visualização.0',
        'Certificado.Visualização_Geral.0',
        'Certificado.Vinculados.0',
        'Certificado.Pesquisa_Por_Usuário.1',
        'Certificado.Vincular_Certificados.1',
        'Curso.Cadastro.1',
        'Curso.Edição.0',
        'Curso.Pesquisa.1',
        'Curso.Visualização.0',
        'Professor.Edição.0',
        'Professor.Pesquisa.1',
        'Professor.Visualização.0',
        'Projeto.Cadastro.1',
        'Projeto.Edição.0',
        'Projeto.Pesquisa.1',
        'Projeto.Visualização.0',
        'Projeto.Visualização_Geral.0',
        'Projeto.Avaliar.0',
        'Projeto.Exclusão.0',
        'Setor.Cadastro.1',
        'Setor.Edição.0',
        'Setor.Pesquisa.1',
        'Setor.Visualização.0',
        'Usuário.Cadastro.1',
        'Usuário.Edição.0',
        'Usuário.Pesquisa.1',
        'Usuário.Visualização.0',
        'Usuário.Exclusão.0',
        'Visitante.Edição.0',
        'Visitante.Pesquisa.1',
        'Visitante.Visualização.0'
    ],
    'professor' :[
        'Certificado.Pesquisa.1',
        'Projeto.Cadastro.1',
        'Projeto.Edição.0',
        'Projeto.Pesquisa.1',
        'Projeto.Visualização.0'               
    ],
    'aluno' :[
        'Certificado.Pesquisa.1'
    ],
    'visitante' :[
        'Certificado.Pesquisa.1'
    ]
};

function permissoesPorUsuario(tipoUsuario) {
    var permissoesUsuario = permissoes[tipoUsuario];

    var checkboxes = $('input[name="permissoes[]"]');
    for (var index = 0, tamanho = checkboxes.length; index < tamanho; index++) {
        var checkbox = checkboxes[index];

        if ($.inArray(checkbox.value, permissoesUsuario) > -1) {
            checkbox.checked = true;
        } else {
            checkbox.checked = false;
        }
    }

}


