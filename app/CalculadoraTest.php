<?php
    require_once (__DIR__.'/Calculadora.php');
    use \PHPUnit\Framework\TestCase;

    class CalculadoraTest extends TestCase
    {

        public function sumarProveedor()
        {
            return[
                'Caso 1' => [-1,-1,-2],
                'Caso 2' => [0,0,0],
                'Caso 3' => [0,-1,-1],
                'Caso 4' => [-1,0,-1]
    
            ];
        }
        
        public function restarProveedor()
        {
            return[
                'Caso 1' => [-1,-1,0],
                'Caso 2' => [0,0,0],
                'Caso 3' => [0,-1,1],
                'Caso 4' => [-1,0,-1]
    
            ];
        }

        public function multiplicarProveedor()
        {
            return[
                'Caso 1' => [-1,-1,1],
                'Caso 2' => [0,0,0],
                'Caso 3' => [0,-1,0],
                'Caso 4' => [-1,0,0]
    
            ];
        }
        
        public function dividirProveedor()
        {
            return[
                'Caso 1' => [-1,-1,1,0],
                'Caso 2' => [0,0,"Exception",""],
                'Caso 3' => [0,-1,0,0],
                'Caso 4' => [-1,0,"Exception",""],
                'Caso 5' => [1,3,0.33,0.01]
            ];
        }

        // Suma---------------------------------------------------------------
        /**
        * @dataProvider sumarProveedor
        */
        public function testSumar($num1,$num2,$resultadoEsperado)
        {
            $calculadora= new Calculadora();
            // Sin proveedor

            // $resultado_calculadora=$calculadora->sumar(10,10);
            // $this->assertEquals(20,$resultado_calculadora);
            
            // Con proveedor
            $resultado_calculadora=$calculadora->sumar($num1,$num2);
            $this->assertEquals($resultadoEsperado,$resultado_calculadora);
//            $this->assertEquals(5,$resultado_calculadora);

        }

        // Resta-----------------------------------------------------------------
        /**
        * @dataProvider restarProveedor
        */

        public function testRestar($num1,$num2,$resultadoEsperado)
        {
            $calculadora= new Calculadora();
            // Sin proveedor
//             $resultado_calculadora=$calculadora->resstar(3,"3");
//             $this->assertEquals(0,$resultado_calculadora);
// //            $this->assertEquals(5,$resultado_calculadora);

//          Con proveedor
            $resultado_calculadora=$calculadora->resstar($num1,$num2);
            $this->assertEquals($resultadoEsperado,$resultado_calculadora);
//            $this->assertEquals(5,$resultado_calculadora);

        }

        // Multiplicar------------------------------------------------------------
        /**
        * @dataProvider multiplicarProveedor
        */
        public function testMultuplicar($num1,$num2,$resultadoEsperado)
        {
            $calculadora= new Calculadora();
            // Sin poveedor
//             $resultado_calculadora=$calculadora->multiplicar(3,"3");
//             $this->assertEquals(9,$resultado_calculadora);
// //            $this->assertEquals(5,$resultado_calculadora);

            // Con proveedor
            $resultado_calculadora=$calculadora->multiplicar($num1,$num2);
            $this->assertEquals($resultadoEsperado,$resultado_calculadora);
//            $this->assertEquals(5,$resultado_calculadora);

        }

        // Dividir-----------------------------------------------------
        /**
        * @dataProvider dividirProveedor
        */
        public function testDividir($num1,$num2,$resultadoEsperado,$delta)
        {
            $calculadora= new Calculadora();
            // Sin proveedor
//             $resultado_calculadora=$calculadora->dividir(1,3);
// //            $this->assertEqualsWithDelta(0.33,$resultado_calculadora,0.004);
//             $this->assertEqualsWithDelta(0.33,$resultado_calculadora,0.003);

            // Con proveedor
            if($num2 !=0){
                $this->assertEqualsWithDelta($resultadoEsperado,$calculadora->dividir($num1,$num2),$delta);
            }else{
                $this->expectException("Exception");
                $calculadora->dividir($num1,$num2);
            }
            

        }
        // Arreglo-------------------------------------
        public function testGeneraArreglo()
        {
            $calculadora= new Calculadora();
        //    $this->assertContains(8,$calculadora->generarArreglo());
        //    $this->assertCount(7,$calculadora->generarArreglo());
            $this->assertEmpty($calculadora->generarArregloVacio());
        }
    }


   
