<table id="dgFichaClinica"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>ficha_clinica/listar"
        toolbar="#toolbarFichaClinica" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_ficha_clinica" width="10">ID</th>
            <th field="otica" width="25">ÓTICA</th>
            <th field="nome" width="25">NOME</th>
            <th field="telefone" width="10">TELEFONE</th>
            <th field="data_nascimento" width="10">DATA NASCIMENTO</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoFichaClinica">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarFichaClinica">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novaFichaClinica()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarFichaClinica()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-check-square-o fa-lg" plain="true" onclick="finalizarFichaClinica()">Finalizar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="cancelarFichaClinica()">Cancelar</a>
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuImpressao'" iconCls="fa fa-print fa-lg" plain="true">Impressões</a>
    <div id="menuImpressao" style="width:170px;">
        <div onclick="gerarPdf()">Ficha Clínica</div>
        <div onclick="gerarPdfEncaminhamento()">Encaminhamento</div>
        <div onclick="gerarPdfDeclaracao()">Declaração</div>
        <div onclick="gerarPdfReceita()">Receita</div>
    </div>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaFichaClinica" searcher='buscaFichaClinica' style="width:30%">
    <div id='menuBuscaFichaClinica' style='width:auto'>
        <div name='id_ficha_clinica'>ID</div>
        <div name='nome'>NOME</div>
        <div name='otica'>ÓTICA</div>
    </div>
</div>

<div id="dlgFichaClinica" class="easyui-dialog" style="width:760px;height:590px" 
        closed="true" buttons="#dlgFichaClinicaButtons" modal="true">
    <form id="formFichaClinica" class="easyui-form" method="post" data-options="novalidate:true">
        <div id="tabFichaClinica" class="easyui-tabs" style="width:auto;height:auto">
            <div title="Paciente">
                <table style="width:98%;">
                    <tr>
                        <td colspan="3">
                            <input class="easyui-combobox" label="Ótica:" labelPosition="top" id="fk_id_otica" name="fk_id_otica" panelHeight="auto" required="true" style="width:100%;" data-options="
                            valueField: 'id_otica',
                            textField: 'otica',
                            url: '<?php base_url();?>oticas/listarCombo',
                            onSelect: function(rec){
                                nomeOtica = rec.otica;
                            }">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="easyui-textbox" label="Nome:" labelPosition="top" id="nome" name="nome" style="width:100%;" required="true">
                        </td>
                        <td>
                            <input class="easyui-textbox" label="Profissão:" labelPosition="top" id="profissao" name="profissao" style="width:100%;" required="true">
                        </td>
                        <td>
                            <select class="easyui-combobox" label="Gênero:" labelPosition="top" id="genero" name="genero" panelHeight="auto" editable="false" required="true" style="width:100%;">
                                <option value='1'>Feminino</option>
                                <option value='2'>Masculino</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="easyui-datebox" id="data_nascimento" name="data_nascimento" label="Data Nascimento:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                        </td>
                        <td>
                            <input class="easyui-textbox" label="Idade:" labelPosition="top" id="idade" name="idade" style="width:100%;" required="true">
                        </td>
                        <td>
                            <input class="easyui-textbox" label="Telefone:" labelPosition="top" id="telefone" name="telefone" style="width:100%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="easyui-datebox" id="data_ultima_consulta" name="data_ultima_consulta" label="Data Últ. Consulta:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                        </td>
                        <td>
                            <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                                <option value='0'>Aberta</option>
                                <option value='1'>Atendida</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label>Motivo Consulta:</label>
                            <input class="easyui-textbox" id="motivo_consulta" name="motivo_consulta" style="width:100%;height:50px" multiline="true" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label>Informações Pessoais:</label>
                            <input class="easyui-textbox" id="informacoes_pessoais" name="informacoes_pessoais" style="width:100%;height:50px" multiline="true" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="easyui-combobox" label="Formas de Pagamento:" labelPosition="top" id="fk_id_forma_pagamento" name="fk_id_forma_pagamento" panelHeight="auto" required="true" style="width:100%;">
                                <?php foreach ($list_formas_pgto as $pgto) { 
                                    echo "<option value='".$pgto->id_forma_pagamento."'>".$pgto->descricao."</option>";
                                } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div title="Informações">
                <table style="width:98%;">
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Retinoscopia Estática Olho Direito:" labelPosition="top" id="retinoscopia_estatica_od" name="retinoscopia_estatica_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Retinoscopia Estática Olho Esquerdo:" labelPosition="top" id="retinoscopia_estatica_oe" name="retinoscopia_estatica_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Esférica Olho Direito:" labelPosition="top" id="lesometria_esferica_od" name="lesometria_esferica_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Esférica Olho Esquerdo:" labelPosition="top" id="lesometria_esferica_oe" name="lesometria_esferica_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Cilindrica Olho Direito:" labelPosition="top" id="lesometria_cilindrica_od" name="lesometria_cilindrica_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Cilindrica Olho Esquerdo:" labelPosition="top" id="lesometria_cilindrica_oe" name="lesometria_cilindrica_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Eixo Olho Direito:" labelPosition="top" id="lesometria_eixo_od" name="lesometria_eixo_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Eixo Olho Esquerdo:" labelPosition="top" id="lesometria_eixo_oe" name="lesometria_eixo_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Adição Olho Direito:" labelPosition="top" id="lesometria_adicao_od" name="lesometria_adicao_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Lesometria Adição Olho Esquerdo:" labelPosition="top" id="lesometria_adicao_oe" name="lesometria_adicao_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Afinação Olho Direito:" labelPosition="top" id="afinacao_od" name="afinacao_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Afinação Olho Esquerdo:" labelPosition="top" id="afinacao_oe" name="afinacao_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="RX Olho Direito:" labelPosition="top" id="rx_od" name="rx_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="RX Olho Esquerdo:" labelPosition="top" id="rx_oe" name="rx_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>RX Observações:</label>
                            <input class="easyui-textbox" id="rx_observacoes" name="rx_observacoes" style="width:99%;height:50px" multiline="true" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select class="easyui-combobox" label="Hirschberg:" labelPosition="top" id="fk_id_hirschberg" name="fk_id_hirschberg" panelHeight="auto" required="true" style="width:98%;">
                                <?php foreach ($list_hirschberg as $hirs) { 
                                    echo "<option value='".$hirs->id_hirschberg."'>".$hirs->descricao."</option>";
                                } ?>
                            </select>
                        </td>
                        <td>
                            <input class="easyui-combobox" label="Olho Dominante:" labelPosition="top" id="fk_id_olho_dominante" name="fk_id_olho_dominante" panelHeight="auto" required="true" style="width:98%;" data-options="
                            valueField: 'id_olho_dominante',
                            textField: 'descricao',
                            url: '<?php base_url();?>olho_dominante/listarCombo',
                            onSelect: function(olh){
                                descricaoOlhoDominante = olh.descricao;
                            }">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Oftalnoscopia Observações:</label>
                            <input class="easyui-textbox" id="oftalnoscopia_observacoes" name="oftalnoscopia_observacoes" style="width:99%;height:50px" multiline="true" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Acuidade Visual Longe Olho Direito:" labelPosition="top" id="acuidade_visual_longe_od" name="acuidade_visual_longe_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Acuidade Visual Longe Olho Esquerdo:" labelPosition="top" id="acuidade_visual_longe_oe" name="acuidade_visual_longe_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Acuidade Visual Perto Olho Direito:" labelPosition="top" id="acuidade_visual_perto_od" name="acuidade_visual_perto_od" style="width:98%;" required="true">
                        </td>
                        <td style="width:50%;">
                            <input class="easyui-textbox" label="Acuidade Visual Perto Olho Esquerdo:" labelPosition="top" id="acuidade_visual_perto_oe" name="acuidade_visual_perto_oe" style="width:98%;" required="true">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input class="easyui-textbox" label="PPC:" labelPosition="top" id="ppc" name="ppc" style="width:99%;" required="true">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
<div id="dlgFichaClinicaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgFichaClinica').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarFichaClinica()" style="width:90px">Salvar</a>
</div>

<!-- MODAL FINALIZAR -->
<div id="dlgFinalizarFichaClinica" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgFinalizarFichaClinicaButtons" modal="true">
    <form id="formFinalizarFichaClinica" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="finalizar_ficha_clinica" name="finalizar_ficha_clinica">
        <h3 style="text-align: center;">Deseja finalizar essa ficha clínica?</h3>
    </form>
</div>
<div id="dlgFinalizarFichaClinicaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgFinalizarFichaClinica').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarFinalizarFichaClinica()" style="width:90px">Salvar</a>
</div>

<!-- MODAL CANCELAR -->
<div id="dlgCancelarFichaClinica" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgCancelarFichaClinicaButtons" modal="true">
    <form id="formCancelarFichaClinica" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="cancelar_ficha_clinica" name="cancelar_ficha_clinica">
        <h3 style="text-align: center;">Deseja cancelar essa ficha clínica?</h3>
    </form>
</div>
<div id="dlgCancelarFichaClinicaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgCancelarFichaClinica').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarCancelarFichaClinica()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

// USADO PARA PEGAR O NOME DA ÓTICA E IMPRIMIR APÓS SALVAR
var nomeOtica;
var descricaoOlhoDominante;

function formatarDataCombo(date)
{
    return [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
}

function formatarDataComboParser(s)
{
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    return date;
}

// BUSCA
function buscaFichaClinica(value,name)
{
    if(name == 'id_ficha_clinica'){
        $('#dgFichaClinica').datagrid('load',{
            id_ficha_clinica: value
        });
    }else if(name == 'nome'){
        $('#dgFichaClinica').datagrid('load',{
            nome: value
        });
    }else if(name == 'otica'){
        $('#dgFichaClinica').datagrid('load',{
            otica: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoFichaClinica(value,row){
    if(value == '2') {
        return '<i class="fa fa-calendar fa-lg" style="color:gray"></i>';
    } else if (value == '3'){
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    } else {
        return '<i class="fa fa-calendar fa-lg" style="color:green"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgFichaClinica').datagrid({
    onDblClickCell: function(index,field,value){
        editarFichaClinica();
    }
});

// NOVO
function novaFichaClinica(){
    $('#dlgFichaClinica').dialog('open').dialog('center').dialog('setTitle','Nova Ficha Clínica');
    $('#tabFichaClinica').tabs('select',0);
    $('#formFichaClinica').form('clear');
    url = '<?php base_url();?>ficha_clinica/cadastrar';
}

// EDITAR
function editarFichaClinica(){
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        $('#dlgFichaClinica').dialog('open').dialog('center').dialog('setTitle','Editar Ficha Clínica');
        $('#tabFichaClinica').tabs('select',0);
        $('#formFichaClinica').form('load',row);
        url = '<?php base_url();?>ficha_clinica/atualizar/'+row.id_ficha_clinica;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// FINALIZAR
function finalizarFichaClinica(){
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $.messager.alert('Atenção','Essa ficha está atendida','warning');
        } else {
            $('#finalizar_ficha_clinica').val(1);

            $('#dlgFinalizarFichaClinica').dialog('open').dialog('center').dialog('setTitle','Finalizar Ficha Clínica');
            $('#formFinalizarFichaClinica').form('load',row);
            url = '<?php base_url();?>ficha_clinica/finalizar/'+row.id_ficha_clinica;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// CANCELAR
function cancelarFichaClinica(){
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $.messager.alert('Atenção','Essa ficha está atendida','warning');
        } 
        else if(row.situacao == 3)
        {
            $.messager.alert('Atenção','Essa ficha está cancelada','warning');
        }
        else 
        {
            $('#cancelar_ficha_clinica').val(3);

            $('#dlgCancelarFichaClinica').dialog('open').dialog('center').dialog('setTitle','Cancelar Ficha Clínica');
            $('#formCancelarFichaClinica').form('load',row);
            url = '<?php base_url();?>ficha_clinica/cancelar/'+row.id_ficha_clinica;
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarFichaClinica(){
    $('#formFichaClinica').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                gerarPdfAposSalvar();
                $('#dlgFichaClinica').dialog('close');
                $('#dgFichaClinica').datagrid('reload');
            }
        }
    });
}

// FINALIZAR
function salvarFinalizarFichaClinica(){
    $('#formFinalizarFichaClinica').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgFinalizarFichaClinica').dialog('close');
                $('#dgFichaClinica').datagrid('reload');
            }
        }
    });
}

// CANCELAR
function salvarCancelarFichaClinica(){
    $('#formCancelarFichaClinica').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgCancelarFichaClinica').dialog('close');
                $('#dgFichaClinica').datagrid('reload');
            }
        }
    });
}

// CONVERTE O LOGOTIPO EM BASE64
function converteBase64(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
}

// GERAR PDF APÓS CADASTRAR
function gerarPdfAposSalvar() {

    var demData = $.messager.progress({
        title:'Aguarde',
        msg:'Carregando informações...'
    });

    setTimeout(function(){
        
        // CHAMA A FUNÇÃO PARA CONVERTER O LOG EM BASE64 E MONTA O LAYOUT
        converteBase64('<?php base_url();?>assets/images/logo.jpg', function(logotipo) {

            // CRIAR A CHAMADA DO JSPDF
            var doc = new jsPDF();

            // LOGOTIPO
            doc.addImage(logotipo, "JPEG", 15, 5, 40, 30);

            // TÍTULO
            doc.setFontSize(30);
            doc.setFontStyle("bold");
            doc.text("Ficha Clínica", 90, 25);

            // DEFINE O GENERO
            var tipogenero = "Feminino";
            if(genero.value == 2)
            {
                tipogenero = "Masculino";
            }

            var dataatual = new Date()

            // CABEÇALHO
            doc.setFontSize(12);
            doc.setFontStyle("normal");
            doc.text("Nome: " + nome.value, 15, 45);
            doc.text("Ótica: " + nomeOtica, 15, 50);
            doc.text("Data Nasc.: " + data_nascimento.value, 15, 55);
            doc.text("Profissão: " + profissao.value, 15, 60);
            doc.text("Data/Hora: " + dataatual.getDate().toString().padStart(2, '0') + '/' + (dataatual.getMonth()+1).toString().padStart(2, '0') + '/' + dataatual.getFullYear() + ' - ' + dataatual.getHours().toString().padStart(2, '0') + ':' + dataatual.getMinutes().toString().padStart(2, '0') + ':' + dataatual.getSeconds().toString().padStart(2, '0'), 130, 45);
            doc.text("Idade: " + idade.value, 130, 50);
            doc.text("Gênero: " + tipogenero, 130, 55);
            doc.text("Última Consulta: " + data_ultima_consulta.value, 130, 60);

            // LINHAS
            doc.line(15, 65, 195, 65);
            doc.line(15, 75, 195, 75);
            doc.line(15, 85, 195, 85);
            doc.line(15, 95, 195, 95);

            // CRIA A PRIMEIRA TABELA
            doc.setFontStyle("bold");
            doc.text("Lensometria", 15, 100);
            doc.autoTable({
                startY: 102,
                headStyles:{
                    valign: 'middle',
                    halign : 'center'
                },
                head: [['', 'Esferico', 'Cilindrico', 'Eixo', 'Add']],
                body: [
                    ['OD', lesometria_esferica_od.value, lesometria_cilindrica_od.value, lesometria_eixo_od.value, lesometria_adicao_od.value],
                    ['OE', lesometria_esferica_oe.value, lesometria_cilindrica_oe.value, lesometria_eixo_oe.value, lesometria_adicao_oe.value],
                ],
                foot: [['Obs.: ' + oftalnoscopia_observacoes.value, '']],
            });
            

            // CRIA A SEGUNDA TABELA
            doc.text("Acuidade Visual", 15, 140);
            doc.autoTable({
                startY: doc.autoTableEndPosY() + 10,
                headStyles:{
                    valign: 'middle',
                    halign : 'center'
                },
                head: [['C/C', 'Longe', 'Perto', 'PH']],
                body: [
                    ['', acuidade_visual_longe_od.value, acuidade_visual_perto_od.value, ''],
                    ['', acuidade_visual_longe_oe.value, acuidade_visual_perto_oe.value, ''],
                ],
            });

            // TEXTOS
            doc.setFontStyle("normal");
            doc.text("Optotipo: ", 15, 170);
            doc.text("Reflexos Pupilares: ", 15, 175);
            doc.text("Olho Dominante: " + descricaoOlhoDominante, 15, 180);
            doc.text("PPC: " + ppc.value, 15, 185);
            doc.text("Bruener: ", 15, 190);

            // TEXTOS
            doc.setFontStyle("bold");
            doc.text("Oftalmoscopia", 15, 200);
            doc.setDrawColor(0, 0, 0);
            doc.line(15, 202, 195, 202);
            doc.line(15, 212, 195, 212);
            doc.line(15, 222, 195, 222);

            // TEXTOS
            doc.text("Retinoscopia Estática", 15, 228);
            doc.setFontStyle("normal");
            doc.text("OD. " + retinoscopia_estatica_od.value + '.00', 15, 234);
            doc.text("OE. " + retinoscopia_estatica_oe.value + '.00', 130, 234);

            // TEXTOS
            doc.setFontStyle("bold");
            doc.text("Afinamento", 15, 242);
            doc.setFontStyle("normal");
            doc.text("OD. " + afinacao_od.value + '.00', 15, 248);
            doc.text("OE. " + afinacao_oe.value + '.00', 130, 248);

            // TEXTOS
            doc.setFontStyle("bold");
            doc.text("RX: " + rx_observacoes.value, 15, 256);
            doc.setFontStyle("normal");
            doc.text("OD. " + rx_od.value + '.00', 15, 262);
            doc.text("OE. " + rx_oe.value + '.00', 130, 262);

            // TEXTOS
            doc.setFontStyle("bold");
            doc.text("Obs.: " + rx_observacoes.value, 15, 272);
            doc.line(15, 274, 195, 274);
            doc.line(15, 284, 195, 284);

            // GERA O PDF
            doc.save("Ficha "+nome.value+".pdf");

        });

        $.messager.progress('close');
    },3000)
}

// GERAR PDF
function gerarPdf() {
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        //if(row.situacao == 0) {
        //    $.messager.alert('Atenção','Essa ficha está atendida','warning');
        //} else {
            
            var demData = $.messager.progress({
                title:'Aguarde',
                msg:'Carregando informações...'
            });

            setTimeout(function(){
                
                // CHAMA A FUNÇÃO PARA CONVERTER O LOG EM BASE64 E MONTA O LAYOUT
                converteBase64('<?php base_url();?>assets/images/logo.jpg', function(logotipo) {

                    // CRIAR A CHAMADA DO JSPDF
                    var doc = new jsPDF();

                    // LOGOTIPO
                    doc.addImage(logotipo, "JPEG", 15, 5, 40, 30);

                    // TÍTULO
                    doc.setFontSize(30);
                    doc.setFontStyle("bold");
                    doc.text("Ficha Clínica", 90, 25);

                    // DEFINE O GENERO
                    var genero = "Feminino";
                    if(row.genero == 2)
                    {
                        genero = "Masculino";
                    }

                    // CABEÇALHO
                    doc.setFontSize(12);
                    doc.setFontStyle("normal");
                    doc.text("Nome: " + row.nome, 15, 45);
                    doc.text("Ótica: " + row.otica, 15, 50);
                    doc.text("Data Nasc.: " + row.data_nascimento, 15, 55);
                    doc.text("Profissão: " + row.profissao, 15, 60);
                    doc.text("Data/Hora: " + row.cadastrado_em, 130, 45);
                    doc.text("Idade: " + row.idade, 130, 50);
                    doc.text("Gênero: " + genero, 130, 55);
                    doc.text("Última Consulta: " + row.data_ultima_consulta, 130, 60);

                    // LINHAS
                    doc.line(15, 65, 195, 65);
                    doc.line(15, 75, 195, 75);
                    doc.line(15, 85, 195, 85);
                    doc.line(15, 95, 195, 95);

                    // CRIA A PRIMEIRA TABELA
                    doc.setFontStyle("bold");
                    doc.text("Lensometria", 15, 100);
                    doc.autoTable({
                        startY: 102,
                        headStyles:{
                            valign: 'middle',
                            halign : 'center'
                        },
                        head: [['', 'Esferico', 'Cilindrico', 'Eixo', 'Add']],
                        body: [
                            ['OD', row.lesometria_esferica_od, row.lesometria_cilindrica_od, row.lesometria_eixo_od, row.lesometria_adicao_od],
                            ['OE', row.lesometria_esferica_oe, row.lesometria_cilindrica_oe, row.lesometria_eixo_oe, row.lesometria_adicao_oe],
                        ],
                        foot: [['Obs.:', '']],
                    });

                    // CRIA A SEGUNDA TABELA
                    doc.text("Acuidade Visual", 15, 140);
                    doc.autoTable({
                        startY: doc.autoTableEndPosY() + 10,
                        headStyles:{
                            valign: 'middle',
                            halign : 'center'
                        },
                        head: [['C/C', 'Longe', 'Perto', 'PH']],
                        body: [
                            ['', row.acuidade_visual_longe_od, row.acuidade_visual_perto_od, ''],
                            ['', row.acuidade_visual_longe_oe, row.acuidade_visual_perto_oe, ''],
                        ],
                    });

                    // TEXTOS
                    doc.setFontStyle("normal");
                    doc.text("Optotipo:", 15, 170);
                    doc.text("Reflexos Pupilares:", 15, 175);
                    doc.text("Olho Dominante: " + row.descricao_olho_dominante, 15, 180);
                    doc.text("PPC: " + row.ppc, 15, 185);
                    doc.text("Bruener:", 15, 190);

                    // TEXTOS
                    doc.setFontStyle("bold");
                    doc.text("Oftalmoscopia " + row.oftalnoscopia_observacoes, 15, 200);
                    doc.setDrawColor(0, 0, 0);
                    doc.line(15, 202, 195, 202);
                    doc.line(15, 212, 195, 212);
                    doc.line(15, 222, 195, 222);

                    // TEXTOS
                    doc.text("Retinoscopia Estática", 15, 228);
                    doc.setFontStyle("normal");
                    doc.text("OD. " + row.retinoscopia_estatica_od, 15, 234);
                    doc.text("OE. " + row.retinoscopia_estatica_oe, 130, 234);

                    // TEXTOS
                    doc.setFontStyle("bold");
                    doc.text("Afinamento", 15, 242);
                    doc.setFontStyle("normal");
                    doc.text("OD. " + row.afinacao_od, 15, 248);
                    doc.text("OE. " + row.afinacao_oe, 130, 248);

                    // TEXTOS
                    doc.setFontStyle("bold");
                    doc.text("RX", 15, 256);
                    doc.setFontStyle("normal");
                    doc.text("OD. " + row.rx_od, 15, 262);
                    doc.text("OE. " + row.rx_oe, 130, 262);

                    // TEXTOS
                    doc.setFontStyle("bold");
                    doc.text("Obs.: " + row.rx_observacoes, 15, 272);
                    doc.line(15, 274, 195, 274);
                    doc.line(15, 284, 195, 284);

                    // GERA O PDF
                    doc.save("Ficha "+row.nome+".pdf");

                });

                $.messager.progress('close');
            },3000)
        //}
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// GERAR PDF ENCAMINHAMENTO
function gerarPdfEncaminhamento() {
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        //if(row.situacao == 0) {
        //    $.messager.alert('Atenção','Essa ficha está atendida','warning');
        //} else {
            
            var demData = $.messager.progress({
                title:'Aguarde',
                msg:'Carregando informações...'
            });

            setTimeout(function(){
                
                // CHAMA A FUNÇÃO PARA CONVERTER O LOG EM BASE64 E MONTA O LAYOUT
                converteBase64('<?php base_url();?>assets/images/logo.jpg', function(logotipo) {

                    // CRIAR A CHAMADA DO JSPDF
                    var doc = new jsPDF();

                    // LOGOTIPO
                    doc.addImage(logotipo, "JPEG", 80, 5, 40, 30);

                    // TÍTULO
                    doc.setFontSize(18);
                    doc.setFontStyle("bold");
                    doc.text("ENCAMINHAMENTO", 70, 60);

                    // CABEÇALHO
                    doc.setFontSize(12);
                    doc.setFontStyle("normal");
                    doc.text("Data:   ______/______/______", 70, 90);

                    // TEXTOS
                    doc.setFontSize(12);
                    doc.setFontStyle("bold");
                    doc.text("Sr(a) ", 15, 120);
                    doc.setDrawColor(0, 0, 0);
                    doc.line(15, 122, 195, 122);
                    doc.text("portador do RG ", 15, 130);
                    doc.line(15, 132, 195, 132);
                    doc.text("para a avaliação com o médico", 15, 140);
                    doc.line(15, 142, 195, 142);

                    // TEXTOS
                    doc.line(15, 260, 195, 260);
                    doc.setFontSize(11.5);
                    doc.text("Técnico em Óptica e Optometria diplomado pelo Instituto Politécnico de Saúde de acordo", 15, 265);
                    doc.text("com a Lei Federal nº 9394/96 - Decreto Federal 2208/97 - CBO do M.T.E: Cadastro Brasileiro", 15, 270);
                    doc.text("de Ocupações nº 3223-10, portaria inclui óptico optometrista - CNE/CEB 4/99 - Resolução CEB", 15, 275);
                    doc.text("nº 4, de 8 de Dezembro de 1999 - - Decreto 2", 15, 280);

                    // GERA O PDF
                    doc.save("Encaminhamento "+row.nome+".pdf");

                });

                $.messager.progress('close');
            },3000)
        //}
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// GERAR PDF DECLARAÇÃO
function gerarPdfDeclaracao() {
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        //if(row.situacao == 0) {
        //    $.messager.alert('Atenção','Essa ficha está atendida','warning');
        //} else {
            
            var demData = $.messager.progress({
                title:'Aguarde',
                msg:'Carregando informações...'
            });

            setTimeout(function(){
                
                // CHAMA A FUNÇÃO PARA CONVERTER O LOG EM BASE64 E MONTA O LAYOUT
                converteBase64('<?php base_url();?>assets/images/logo.jpg', function(logotipo) {

                    // CRIAR A CHAMADA DO JSPDF
                    var doc = new jsPDF();

                    // LOGOTIPO
                    doc.addImage(logotipo, "JPEG", 80, 5, 40, 30);

                    // TÍTULO
                    doc.setFontSize(18);
                    doc.setFontStyle("bold");
                    doc.text("DECLARAÇÃO", 78, 60);

                    // TEXTOS
                    doc.setFontSize(12);
                    doc.setFontStyle("bold");
                    doc.setDrawColor(0, 0, 0);
                    doc.text("Eu ", 15, 90);
                    doc.line(15, 92, 195, 92);
                    doc.text("portador do RG ", 15, 102);
                    doc.line(15, 104, 195, 104);
                    doc.text("e CPF ", 120, 102);
                    doc.line(15, 104, 195, 104);
                    doc.text("declaro ter sido orientado (a) a procurar profissional médico por suspeita de alteração", 15, 114);
                    doc.text("patológica detectada no exame do Optometrista e que a responsabilidade pela", 15, 124);
                    doc.text("conduta clínica ficará a cargo do profissional médico escolhido por mim.", 15, 134);
                    doc.text("Assinatura:", 15, 170);
                    doc.line(15, 172, 195, 172);
                    doc.text("Rio de Janeiro, ______ de ________________ de 20____.", 15, 190);

                    // GERA O PDF
                    doc.save("Declaração "+row.nome+".pdf");

                });

                $.messager.progress('close');
            },3000)
        //}
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// GERAR PDF RECEITA
function gerarPdfReceita() {
    var row = $('#dgFichaClinica').datagrid('getSelected');
    if (row != null){
        //if(row.situacao == 0) {
        //    $.messager.alert('Atenção','Essa ficha está atendida','warning');
        //} else {
            
            var demData = $.messager.progress({
                title:'Aguarde',
                msg:'Carregando informações...'
            });

            setTimeout(function(){
                
                // CHAMA A FUNÇÃO PARA CONVERTER O LOG EM BASE64 E MONTA O LAYOUT
                converteBase64('<?php base_url();?>assets/images/logo.jpg', function(logotipo) {

                    // CRIAR A CHAMADA DO JSPDF
                    var doc = new jsPDF();

                    // LOGOTIPO
                    doc.addImage(logotipo, "JPEG", 15, 5, 40, 30);

                    // TÍTULO
                    doc.setFontSize(30);
                    doc.setFontStyle("bold");
                    doc.text("Receita", 90, 25);

                    // CABEÇALHO
                    doc.setFontSize(12);
                    doc.setFontStyle("normal");
                    doc.text("Data:   _____________________________________________________________________", 15, 45);
                    doc.text("Nome:  _____________________________________________________________________", 15, 55);
                    doc.text("Idade:  _____________________________________________________________________", 15, 65);

                    // CRIA A PRIMEIRA TABELA
                    doc.setFontSize(20);
                    doc.setFontStyle("bold");
                    doc.text("EXAME DE REFRAÇÃO", 70, 90);
                    doc.autoTable({
                        startY: 95,
                        headStyles:{
                            valign: 'middle',
                            halign : 'center'
                        },
                        head: [['Longe', 'Esferico', 'Cilindrico', 'Eixo']],
                        body: [
                            ['OD', '', '', ''],
                            ['OE', '', '', ''],
                            ['AD', '', '', ''],
                        ],
                    });

                    // CRIA A SEGUNDA TABELA
                    //doc.text("Acuidade Visual", 15, 140);
                    doc.autoTable({
                        startY: doc.autoTableEndPosY() + 10,
                        headStyles:{
                            valign: 'middle',
                            halign : 'center'
                        },
                        head: [['Perto', 'Esferico', 'Cilindrico', 'Eixo']],
                        body: [
                            ['OD', '', '', ''],
                            ['OE', '', '', ''],
                        ],
                    });

                    // TEXTOS
                    doc.setFontSize(12);
                    doc.setFontStyle("bold");
                    doc.text("Obs.:", 15, 170);
                    doc.setDrawColor(0, 0, 0);
                    doc.line(15, 172, 195, 172);
                    doc.line(15, 182, 195, 182);
                    doc.line(15, 192, 195, 192);
                    doc.line(15, 202, 195, 202);

                    // TEXTOS
                    doc.text("Data de Retorno ______/______/______", 60, 225);
                    doc.line(15, 245, 195, 245);

                    // TEXTOS
                    doc.setFontStyle("bold");
                    doc.text("Ao retornar a consulta trazer esta receita", 60, 260);
                    doc.text("Para conferência dos óculos é indispensável o nome do responsável técnico", 20, 270);
                    doc.text("com o número do registro CODERJ", 60, 275);
                    doc.text("Carimbo da Ótica com o CNPJ ou Nota Fiscal", 50, 280);

                    // GERA O PDF
                    doc.save("Receita "+row.nome+".pdf");

                });

                $.messager.progress('close');
            },3000)
        //}
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}
</script>