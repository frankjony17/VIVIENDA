
Ext.define('VIV.store.DepartamentoStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","telefonos","descripcion"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../nomenclador/departamento/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
