<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImovelRequest;

use App\Imovel;

class ImoveisController extends Controller
{
    protected $imovel;

    public function __construct(Imovel $imovel)
    {
        $this->imovel = $imovel;
    }

    public function criar(ImovelRequest $request)
    {
        $this->imovel->create($request->all());
        return response()->json(['msg', 'Imóvel cadastrado com sucesso'], 201); 
    }

    public function atualizar(Request $request, $id)
    {
        $product = $this->imovel->find($id);
        $product->update($request->all());
        return response()->json(['msg', 'Produto atualizado com sucesso'], 201); 
    }

    public function deletar(Imovel $id)
    {
        if($id->delete())
            return response()->json(['msg' =>'Imóvel deletado com sucesso'], 200); 
    }

    public function exibir(Request $request)
    {
        $paginacao = 1;

        if($request->query('q'))
        {
            $q = '%' . $request->query('q') . '%';
            $this->imovel = $this->imovel->where('municipio', 'like', $q)->orWhere('bairro', 'like', $q);
        }

        if($request->query('campos'))
        {
            $campos = (explode(',', $request->query('campos')));
            $ordem  = (is_null($request->query('ordem'))) ? 'asc' : $request->query('ordem');

            foreach($campos as $campo)
            {
                if(in_array($campo, ['bairro', 'municipio']))
                {
                    $this->imovel = $this->imovel->orderBy($campo, $ordem);
                }
            }
        }

        if($request->query('paginacao'))
        {
            $paginacao = $request->query('paginacao');    
        }

        return $this->imovel->paginate(1);
    }
}
