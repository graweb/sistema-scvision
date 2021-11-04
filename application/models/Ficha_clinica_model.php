<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha_clinica_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_ficha_clinica')->result();
    }

    public function cadastrar(){

        $dtNascimento = strtr($this->input->post('data_nascimento'), '/', '-');
        $dtUltConsulta = strtr($this->input->post('data_ultima_consulta'), '/', '-');

        return $this->db->insert('tb_ficha_clinica',array(
            'fk_id_otica'=>$this->input->post('fk_id_otica', true),
            'fk_id_forma_pagamento'=>$this->input->post('fk_id_forma_pagamento', true),
            'fk_id_hirschberg'=>$this->input->post('fk_id_hirschberg', true),
            'fk_id_olho_dominante'=>$this->input->post('fk_id_olho_dominante', true),
            'nome'=>$this->input->post('nome', true),
            'profissao'=>$this->input->post('profissao', true),
            'genero'=>$this->input->post('genero', true),
            'idade'=>$this->input->post('idade', true),
            'telefone'=>$this->input->post('telefone', true),
            'data_nascimento'=>date('Y-m-d', strtotime($dtNascimento)),
            'data_ultima_consulta'=>date('Y-m-d', strtotime($dtUltConsulta)),
            'motivo_consulta'=>$this->input->post('motivo_consulta', true),
            'informacoes_pessoais'=>$this->input->post('informacoes_pessoais', true),
            'retinoscopia_estatica_od'=>$this->input->post('retinoscopia_estatica_od', true),
            'retinoscopia_estatica_oe'=>$this->input->post('retinoscopia_estatica_oe', true),
            'afinacao_od'=>$this->input->post('afinacao_od', true),
            'afinacao_oe'=>$this->input->post('afinacao_oe', true),
            'lesometria_esferica_od'=>$this->input->post('lesometria_esferica_od', true),
            'lesometria_esferica_oe'=>$this->input->post('lesometria_esferica_oe', true),
            'lesometria_cilindrica_od'=>$this->input->post('lesometria_cilindrica_od', true),
            'lesometria_cilindrica_oe'=>$this->input->post('lesometria_cilindrica_oe', true),
            'lesometria_eixo_od'=>$this->input->post('lesometria_eixo_od', true),
            'lesometria_eixo_oe'=>$this->input->post('lesometria_eixo_oe', true),
            'lesometria_adicao_od'=>$this->input->post('lesometria_adicao_od', true),
            'lesometria_adicao_oe'=>$this->input->post('lesometria_adicao_oe', true),
            'rx_od'=>$this->input->post('rx_od', true),
            'rx_oe'=>$this->input->post('rx_oe', true),
            'rx_observacoes'=>$this->input->post('rx_observacoes', true),
            'oftalnoscopia_observacoes'=>$this->input->post('oftalnoscopia_observacoes', true),
            'acuidade_visual_longe_od'=>$this->input->post('acuidade_visual_longe_od', true),
            'acuidade_visual_longe_oe'=>$this->input->post('acuidade_visual_longe_oe', true),
            'acuidade_visual_perto_od'=>$this->input->post('acuidade_visual_perto_od', true),
            'acuidade_visual_perto_oe'=>$this->input->post('acuidade_visual_perto_oe', true),
            'ppc'=>$this->input->post('ppc', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function atualizar($id)
    {
        $dtNascimento = strtr($this->input->post('data_nascimento'), '/', '-');
        $dtUltConsulta = strtr($this->input->post('data_ultima_consulta'), '/', '-');

        $this->db->where('id_ficha_clinica', $id);
        return $this->db->update('tb_ficha_clinica',array(
            'fk_id_otica'=>$this->input->post('fk_id_otica', true),
            'fk_id_forma_pagamento'=>$this->input->post('fk_id_forma_pagamento', true),
            'fk_id_hirschberg'=>$this->input->post('fk_id_hirschberg', true),
            'fk_id_olho_dominante'=>$this->input->post('fk_id_olho_dominante', true),
            'nome'=>$this->input->post('nome', true),
            'profissao'=>$this->input->post('profissao', true),
            'genero'=>$this->input->post('genero', true),
            'idade'=>$this->input->post('idade', true),
            'telefone'=>$this->input->post('telefone', true),
            'data_nascimento'=>date('Y-m-d', strtotime($dtNascimento)),
            'data_ultima_consulta'=>date('Y-m-d', strtotime($dtUltConsulta)),
            'motivo_consulta'=>$this->input->post('motivo_consulta', true),
            'informacoes_pessoais'=>$this->input->post('informacoes_pessoais', true),
            'retinoscopia_estatica_od'=>$this->input->post('retinoscopia_estatica_od', true),
            'retinoscopia_estatica_oe'=>$this->input->post('retinoscopia_estatica_oe', true),
            'afinacao_od'=>$this->input->post('afinacao_od', true),
            'afinacao_oe'=>$this->input->post('afinacao_oe', true),
            'lesometria_esferica_od'=>$this->input->post('lesometria_esferica_od', true),
            'lesometria_esferica_oe'=>$this->input->post('lesometria_esferica_oe', true),
            'lesometria_cilindrica_od'=>$this->input->post('lesometria_cilindrica_od', true),
            'lesometria_cilindrica_oe'=>$this->input->post('lesometria_cilindrica_oe', true),
            'lesometria_eixo_od'=>$this->input->post('lesometria_eixo_od', true),
            'lesometria_eixo_oe'=>$this->input->post('lesometria_eixo_oe', true),
            'lesometria_adicao_od'=>$this->input->post('lesometria_adicao_od', true),
            'lesometria_adicao_oe'=>$this->input->post('lesometria_adicao_oe', true),
            'rx_od'=>$this->input->post('rx_od', true),
            'rx_oe'=>$this->input->post('rx_oe', true),
            'rx_observacoes'=>$this->input->post('rx_observacoes', true),
            'oftalnoscopia_observacoes'=>$this->input->post('oftalnoscopia_observacoes', true),
            'acuidade_visual_longe_od'=>$this->input->post('acuidade_visual_longe_od', true),
            'acuidade_visual_longe_oe'=>$this->input->post('acuidade_visual_longe_oe', true),
            'acuidade_visual_perto_od'=>$this->input->post('acuidade_visual_perto_od', true),
            'acuidade_visual_perto_oe'=>$this->input->post('acuidade_visual_perto_oe', true),
            'ppc'=>$this->input->post('ppc', true),
            'situacao'=>$this->input->post('situacao', true),
            'atualizado_em' => date('Y-m-d H:i:s')
        ));
    }

    public function finalizar($id)
    {
        $this->db->where('id_ficha_clinica', $id);
        return $this->db->update('tb_ficha_clinica',array(
            'situacao'=>$this->input->post('finalizar_ficha_clinica',true)
        ));
    }

    public function cancelar($id)
    {
        $this->db->where('id_ficha_clinica', $id);
        return $this->db->update('tb_ficha_clinica',array(
            'situacao'=>$this->input->post('cancelar_ficha_clinica',true)
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_ficha_clinica';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
        $offset = ($page-1) * $rows;

        $id_ficha_clinica = isset($_POST['id_ficha_clinica']) ? strval($_POST['id_ficha_clinica']) : '';
        $nome = isset($_POST['nome']) ? strval($_POST['nome']) : '';
        $otica = isset($_POST['otica']) ? strval($_POST['otica']) : '';

        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_ficha_clinica', $id_ficha_clinica);
        $this->db->like('nome', $nome);
        $this->db->like('otica', $otica);

        $criteria = $this->db->get('vw_ficha_clinica');

        $result = array();
        $result['total'] = $this->db->get('vw_ficha_clinica')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_ficha_clinica'=>$data['id_ficha_clinica'],
                'fk_id_otica'=>$data['fk_id_otica'],
                'otica'=>$data['otica'],
                'fk_id_forma_pagamento'=>$data['fk_id_forma_pagamento'],
                'descricao_forma_pgto'=>$data['descricao_forma_pgto'],
                'fk_id_hirschberg'=>$data['fk_id_hirschberg'],
                'descricao_hirschberg'=>$data['descricao_hirschberg'],
                'fk_id_olho_dominante'=>$data['fk_id_olho_dominante'],
                'descricao_olho_dominante'=>$data['descricao_olho_dominante'],
                'nome'=>$data['nome'],
                'profissao'=>$data['profissao'],
                'genero'=>$data['genero'],
                'idade'=>$data['idade'],
                'telefone'=>$data['telefone'],
                'data_nascimento'=>$data['data_nascimento'],
                'data_ultima_consulta'=>$data['data_ultima_consulta'],
                'motivo_consulta'=>$data['motivo_consulta'],
                'informacoes_pessoais'=>$data['informacoes_pessoais'],
                'retinoscopia_estatica_od'=>$data['retinoscopia_estatica_od'],
                'retinoscopia_estatica_oe'=>$data['retinoscopia_estatica_oe'],
                'afinacao_od'=>$data['afinacao_od'],
                'afinacao_oe'=>$data['afinacao_oe'],
                'lesometria_esferica_od'=>$data['lesometria_esferica_od'],
                'lesometria_esferica_oe'=>$data['lesometria_esferica_oe'],
                'lesometria_cilindrica_od'=>$data['lesometria_cilindrica_od'],
                'lesometria_cilindrica_oe'=>$data['lesometria_cilindrica_oe'],
                'lesometria_eixo_od'=>$data['lesometria_eixo_od'],
                'lesometria_eixo_oe'=>$data['lesometria_eixo_oe'],
                'lesometria_adicao_od'=>$data['lesometria_adicao_od'],
                'lesometria_adicao_oe'=>$data['lesometria_adicao_oe'],
                'rx_od'=>$data['rx_od'],
                'rx_oe'=>$data['rx_oe'],
                'rx_observacoes'=>$data['rx_observacoes'],
                'oftalnoscopia_observacoes'=>$data['oftalnoscopia_observacoes'],
                'acuidade_visual_longe_od'=>$data['acuidade_visual_longe_od'],
                'acuidade_visual_longe_oe'=>$data['acuidade_visual_longe_oe'],
                'acuidade_visual_perto_od'=>$data['acuidade_visual_perto_od'],
                'acuidade_visual_perto_oe'=>$data['acuidade_visual_perto_oe'],
                'ppc'=>$data['ppc'],
                'situacao'=>$data['situacao'],
                'cadastrado_em'=>$data['cadastrado_em']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}