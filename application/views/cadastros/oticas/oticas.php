<table id="dgOticas"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>oticas/listar"
        toolbar="#toolbarOticas" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_otica" width="10">ID</th>
            <th field="otica" width="70">ÓTICA</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoOtica">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarOticas">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novaOtica()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarOtica()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="desativarOtica()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaOtica" searcher='buscaOtica' style="width:30%">
    <div id='menuBuscaOtica' style='width:auto'>
        <div name='id_otica'>ID</div>
        <div name='otica'>ÓTICA</div>
    </div>
</div>

<div id="dlgOticas" class="easyui-dialog" style="width:680px;height:230px" 
        closed="true" buttons="#dlgOticasButtons" modal="true">
    <form id="formOticas" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Ótica:" labelPosition="top" id="otica" name="otica" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgOticasButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgOticas').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarOtica()" style="width:90px">Salvar</a>
</div>

<!-- MODAL DESATIVAR -->
<div id="dlgOticasDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgOticaButtonsDesativar" modal="true">
    <form id="formOticaDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_otica_ativar_desativar" name="situacao_otica_ativar_desativar">
        <h3 style="text-align: center;">Deseja ativar/desativar essa ótica?</h3>
    </form>
</div>
<div id="dlgOticaButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgOticasDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarOticaAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaOtica(value,name){
    if(name == 'id_otica'){
        $('#dgOticas').datagrid('load',{
            id_otica: value
        });
    }else if(name == 'otica'){
        $('#dgOticas').datagrid('load',{
            otica: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoOtica(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgOticas').datagrid({
    onDblClickCell: function(index,field,value){
        editarOtica();
    }
});

// NOVO
function novaOtica(){
    $('#dlgOticas').dialog('open').dialog('center').dialog('setTitle','Nova Ótica');
    $('#formOticas').form('clear');
    url = '<?php base_url();?>oticas/cadastrar';
}

// EDITAR
function editarOtica(){
    var row = $('#dgOticas').datagrid('getSelected');
    if (row != null){
        $('#dlgOticas').dialog('open').dialog('center').dialog('setTitle','Editar Ótica');
        $('#formOticas').form('load',row);
        url = '<?php base_url();?>oticas/atualizar/'+row.id_otica;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// DESATIVAR
function desativarOtica(){
    var row = $('#dgOticas').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#situacao_otica_ativar_desativar').val(0);
        } else {
            $('#situacao_otica_ativar_desativar').val(1);
        }

        $('#dlgOticasDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Ótica');
        $('#formOticaDesativar').form('load',row);
        url = '<?php base_url();?>oticas/desativar/'+row.id_otica;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarOtica(){
    $('#formOticas').form('submit',{
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
                $('#dlgOticas').dialog('close');
                $('#dgOticas').datagrid('reload');
            }
        }
    });
}

// DESATIVAR
function salvarOticaAtivarDesativar(){
    $('#formOticaDesativar').form('submit',{
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
                $('#dlgOticasDesativar').dialog('close');
                $('#dgOticas').datagrid('reload');
            }
        }
    });
}
</script>