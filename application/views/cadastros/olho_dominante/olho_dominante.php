<table id="dgOlhoDominante"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>olho_dominante/listar"
        toolbar="#toolbarOlhoDominante" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_olho_dominante" width="10" hidden="true">ID</th>
            <th field="codigo_olho_dominante" width="20">CÓDIGO</th>
            <th field="descricao" width="80">DESCRIÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarOlhoDominante">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoOlhoDominante()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarOlhoDominante()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaOlhoDominante" searcher='buscaOlhoDominante' style="width:30%">
    <div id='menuBuscaOlhoDominante' style='width:auto'>
        <div name='codigo_olho_dominante'>CÓDIGO</div>
    </div>
</div>

<div id="dlgOlhoDominante" class="easyui-dialog" style="width:480px;height:230px" 
        closed="true" buttons="#dlgOlhoDominanteButtons" modal="true">
    <form id="formOlhoDominante" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Código:" labelPosition="top" id="codigo_olho_dominante" name="codigo_olho_dominante" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descrição:</label>
                    <input class="easyui-textbox" id="descricao" name="descricao" style="width:100%;height:50px" multiline="true" required="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgOlhoDominanteButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgOlhoDominante').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarOlhoDominante()" style="width:90px">Salvar</a>
</div>


<script type="text/javascript">
var url;

//BUSCA
function buscaOlhoDominante(value,name){
    if(name == 'codigo_olho_dominante'){
        $('#dgOlhoDominante').datagrid('load',{
            codigo_olho_dominante: value
        });
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgOlhoDominante').datagrid({
    onDblClickCell: function(index,field,value){
        editarOlhoDominante();
    }
});

// NOVO
function novoOlhoDominante(){
    $('#dlgOlhoDominante').dialog('open').dialog('center').dialog('setTitle','Novo Hirschberg');
    $('#formOlhoDominante').form('clear');
    url = '<?php base_url();?>olho_dominante/cadastrar';
}

// EDITAR
function editarOlhoDominante(){
    var row = $('#dgOlhoDominante').datagrid('getSelected');
    if (row != null){
        $('#dlgOlhoDominante').dialog('open').dialog('center').dialog('setTitle','Editar Hirschberg');
        $('#formOlhoDominante').form('load',row);
        url = '<?php base_url();?>olho_dominante/atualizar/'+row.id_olho_dominante;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarOlhoDominante(){
    $('#formOlhoDominante').form('submit',{
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
                $('#dlgOlhoDominante').dialog('close');
                $('#dgOlhoDominante').datagrid('reload');
            }
        }
    });
}
</script>