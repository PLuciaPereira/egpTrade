// Declarar las variables que necesitás globalmente
let valor_CIF_global = 0;
let valor_base_iva = 0;
let valor_derechos = 0;
let valor_estadistica = 0;
let total_gravamenes = 0;
let total_con_honorarios = 0;
let total_sin_honorarios = 0;

let valor_iva = 0;
let valor_adicional = 0;
let valor_ganancia = 0;
let valor_ib = 0;
let valor_arancel_sim = 0;
 
let valor_fob = 0;
let valor_flete = 0;
let valor_seguro = 0;

function calcular_CIF(){
        //se capturan los valores
         valor_fob= parseFloat(document.getElementById('fob').value) || 0
         valor_flete= parseFloat(document.getElementById('flete').value) || 0
         valor_seguro= parseFloat(document.getElementById('seguro').value) || 0

        //calculo el cif
        valor_CIF_global = valor_fob + valor_flete + valor_seguro

        //muestro el resultado del cif
        document.getElementById('resultado').textContent = "CIF: $" + valor_CIF_global.toFixed(2)

}

function calcular_base_IVA(){
        //se capturan los valores
        let valor_porcentaje_derechos= parseFloat(document.getElementById('porcentaje_derechos').value) || 0
        let valor_porcentaje_estadistica= parseFloat(document.getElementById('porcentaje_estadistica').value) || 0

        //calculo porcentaje 
        let porcentaje_derechos = (valor_porcentaje_derechos / 100) 
        let porcentaje_estadistica = (valor_porcentaje_estadistica / 100) 

        //calculo base iva
        valor_derechos = (porcentaje_derechos * valor_CIF_global);
        valor_estadistica = (porcentaje_estadistica * valor_CIF_global);

        valor_base_iva = valor_CIF_global + valor_derechos + valor_estadistica

        //muestro el resultado de base iva
        document.getElementById('resultado_baseIVA').textContent = "Base IVA: $" + valor_base_iva.toFixed(2)

}
function tasa_IVA(){
        //se capturan los valores
        let valor_porcentaje_iva= parseFloat(document.getElementById('iva').value) || 0
        let valor_porcentaje_ivaAdic= parseFloat(document.getElementById('ivaAD').value) || 0
        let valor_porcentaje_ganacia= parseFloat(document.getElementById('ganancia').value) || 0
        let valor_porcentaje_ib= parseFloat(document.getElementById('ingBr').value) || 0
         valor_arancel_sim= parseFloat(document.getElementById('arancel_sim').value) || 0

        //calculo porcentaje 
        let porcentaje_iva = (valor_porcentaje_iva / 100) 
        let porcentaje_adicional = (valor_porcentaje_ivaAdic / 100)
        let porcentaje_ganancia = (valor_porcentaje_ganacia / 100) 
        let porcentaje_ib =(valor_porcentaje_ib / 100)

        //calculo con base iva
         valor_iva = (porcentaje_iva * valor_base_iva);
         valor_adicional = (porcentaje_adicional * valor_base_iva);
         valor_ganancia = (porcentaje_ganancia * valor_base_iva);
         valor_ib = (porcentaje_ib * valor_base_iva);

        total_gravamenes = valor_derechos + valor_estadistica + valor_base_iva + valor_iva + valor_adicional + valor_ganancia + valor_ib + valor_arancel_sim

        //muestro el resultado de base iva
        document.getElementById('resultado_gravamenes').textContent = "Total gravamenes: $" + total_gravamenes.toFixed(2)

}
function total_sinH(){
    total_sin_honorarios = valor_CIF_global + total_gravamenes
    
    //muestro el total sin honorarios
    document.getElementById('total_sinH').textContent = "Total sin honorarios: $" + total_sin_honorarios.toFixed(2)
}
function total_conH(){
    let valor_honorarios= parseFloat(document.getElementById('honorarios').value) || 0
    let valor_gasto_op= parseFloat(document.getElementById('gasto_op').value) || 0
    let valor_senasa= parseFloat(document.getElementById('senasa').value) || 0
    let valor_digitalizacion= parseFloat(document.getElementById('dig').value) || 0
    
    if(valor_honorarios === 0 && valor_gasto_op === 0 && valor_senasa === 0 && valor_digitalizacion === 0){
        //muestro el total sin honorarios
        document.getElementById('total_conH').textContent = "Total con honorarios: $"
        return false
    }else{
        total_con_honorarios = valor_CIF_global + total_gravamenes + valor_honorarios + valor_gasto_op + valor_senasa + valor_digitalizacion 
        //muestro el total sin honorarios
        document.getElementById('total_conH').textContent = "Total con honorarios: $" + total_con_honorarios.toFixed(2)
        return true
    }
   
}

function recalcular(){
    calcular_CIF();
    calcular_base_IVA();
    tasa_IVA();
    total_sinH();

    let total_conH_calculado = total_conH();

    // Asignar a inputs ocultos para enviar al servidor
     document.getElementById('res_gravamenes').value = total_gravamenes.toFixed(2);
    document.getElementById('res_sinH').value = total_sin_honorarios.toFixed(2);
    document.getElementById('res_cif').value = valor_CIF_global.toFixed(2);
    document.getElementById('res_derechos').value = valor_derechos.toFixed(2);
    document.getElementById('res_estadistica').value = valor_estadistica.toFixed(2);
    document.getElementById('res_base_iva').value = valor_base_iva.toFixed(2);
    document.getElementById('res_iva').value = valor_iva.toFixed(2);
    document.getElementById('res_iva_adic').value = valor_adicional.toFixed(2);
    document.getElementById('res_ganancia').value = valor_ganancia.toFixed(2);
    document.getElementById('res_ib').value = valor_ib.toFixed(2);
    document.getElementById('res_arancel').value = valor_arancel_sim.toFixed(2);
    document.getElementById('res_fob').value = valor_fob.toFixed(2);
    document.getElementById('res_flete').value = valor_flete.toFixed(2);
    document.getElementById('res_seguro').value = valor_seguro.toFixed(2);

    if(total_conH_calculado){
        document.getElementById('res_conH').value = total_con_honorarios.toFixed(2);
    } else {
        document.getElementById('res_conH').value = "0.00";
    }
}
function prepararEnvio() {
    recalcular(); // Esta función ya existe y calcula todo
    return true;  // Permite el envío del formulario
}


function validarPositivoYBoton(inputId, campos, botonId) {
    const input = document.getElementById(inputId);
    const warning = document.getElementById(inputId + '_warning');
    const boton = document.getElementById(botonId);

    input.addEventListener('input', () => {
        const valor = parseFloat(input.value);
        if (valor < 0) {
            warning.textContent = "Solo valores positivos";
        } else {
            warning.textContent = "";
        }

        // Verificar todos los campos
        let algunoNegativo = false;
        campos.forEach(id => {
            const val = parseFloat(document.getElementById(id).value);
            if (!isNaN(val) && val < 0) {
                algunoNegativo = true;
            }
        });

        // Bloquear o desbloquear el botón según corresponda
            boton.disabled = algunoNegativo;
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const campos = [
            'fob', 'flete', 'seguro',
            'porcentaje_derechos', 'porcentaje_estadistica',
            'iva', 'ivaAD', 'ganancia', 'ingBr',
            'arancel_sim', 'honorarios', 'gasto_op', 'senasa', 'dig'
        ];

        const botonId = 'btnCalcular';

        campos.forEach(id => validarPositivoYBoton(id, campos, botonId));
    });


        document.addEventListener("DOMContentLoaded", function() {//se dispara este evento cuando todo el html feu cargado
            const form = document.getElementById('form');

            // Escuchar el evento de submit
            form.addEventListener("submit", function(event) {
                recalcular(); // actualiza los hidden justo antes de enviar
            });


        //cada vez que el navegador detecta un evento en un input (un cambio) se llama a la funcion recalcular
        document.getElementById('fob').addEventListener("input", recalcular)
        document.getElementById('flete').addEventListener("input",recalcular);
        document.getElementById('seguro').addEventListener("input",recalcular );
        document.getElementById('porcentaje_derechos').addEventListener("input",recalcular );
        document.getElementById('porcentaje_estadistica').addEventListener("input",recalcular );
        document.getElementById('iva').addEventListener("input",recalcular );
        document.getElementById('ivaAD').addEventListener("input",recalcular );
        document.getElementById('ganancia').addEventListener("input",recalcular );
        document.getElementById('ingBr').addEventListener("input",recalcular );
        document.getElementById('arancel_sim').addEventListener("input",recalcular );
        document.getElementById('honorarios').addEventListener("input",recalcular );
        document.getElementById('gasto_op').addEventListener("input",recalcular );
        document.getElementById('senasa').addEventListener("input",recalcular );
        document.getElementById('dig').addEventListener("input",recalcular );
    })
