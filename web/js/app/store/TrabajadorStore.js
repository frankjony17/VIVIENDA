
Ext.define('VIV.store.TrabajadorStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre_apellidos","trabajador_cargo_id","departamento_id"],
    autoLoad: true,
    sorters: 'nombre_apellidos',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/trabajador/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
