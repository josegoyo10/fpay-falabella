<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd("llego");
        return "api exitosa";
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    private function esPrimo($num)
    {

        $cont=0;
    
        for($i=2;$i<=$num;$i++)
        {
            if($num%$i==0)
            {
                if(++$cont>1)
                    return false;
            }
        }
        return true;

    }


    /**
    **@name numero-primo
    **@method POST
    **@description Método que permite mostrar dado un numero la cantidad de numeros primos descendentemente.
    **@autor José Gregorio Rodriguez Rason
    **@date 06/03/2022
    **URL:http://127.0.0.1:8000/api/numero-primo
	**@param 	{
				  "numero": 15
				
				}
    ** 
	** @return 
    **/

    public function store(Request $request)
    {
        $numero = $request->numero;
        $cont = 0;
        $arrayNumeros = [];

        $request->validate([
             'numero' => 'required|numeric|gt:0',
         ],
         [
             'numero.required'  => '(*) El numero es requerido',
         ]);

        if (($numero == 0) OR ($numero == 1)) {
            $array = array(
                'estado'=>'OK',
                'mensaje'=>"Debes ingresar un valor Mayor a 1",
                'codigo'=>200,
                'response'=>$numero );
        } else {
        
                for ($i=$numero; $i > 1; $i--) {
                    
                    if ($this->esPrimo($i)) {
                        
                            $arrayNumeros[] = $i;
                            
                    }
                }

                $codigo = 200;
                $array=
                     array
                     (
                         'estado'=>'OK',
                         'mensaje'=>"Operacion Exitosa",
                         'codigo'=>$codigo,
                         'response'=>$arrayNumeros
                     );
         }
          
		         	
		    return response()->json($array, 200);	
      
    }

   



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
