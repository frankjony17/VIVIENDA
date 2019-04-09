
Ext.define('VIV.store.EntidadStore', {
    extend: 'Ext.data.Store',
    /* Config */
    fields: ["id","nombre","telefonos","correo_electronico","direccion","fax"],
    autoLoad: true,
    sorters: 'nombre',
    proxy : {
        type : 'ajax',
        url: '../despacho/entidad/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});
