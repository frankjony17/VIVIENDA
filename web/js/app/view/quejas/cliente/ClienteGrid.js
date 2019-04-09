
Ext.define('VIV.view.quejas.cliente.ClienteGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-cliente',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    collapsible: false,
    scrollable: 'vertical',
    features: [{
        groupHeaderTpl: 'Tipo: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    /* Store */
    store: Ext.create('VIV.store.ClienteStore'),
    /* Columns */
    columns: [
        {"xtype":"rownumberer","text":"No","width":45,"align":"center"},
        {"text":"Id","dataIndex":"id","flex":2,"hidden":true},
        {"text":"# Carnet (CI)","dataIndex":"ci","flex":4,"hidden":false},
        {
            text: "Nombre y Apellidos",
            xtype: 'templatecolumn',
            tpl:'{nombre} {apellidos}',
            dataIndex: "nombre",
            flex: 8,
            hidden: false
        },{
            text: "Apellidos", dataIndex: "apellidos", flex: 4, hidden: true
        },{
            text: 'Dirección (Particular)',
            flex: 1,
            columns: [
                {"text":"Calle","dataIndex":"calle"},
                {"text":"Entre","dataIndex":"entre"},
                {"text":"Apto.","dataIndex":"apartamento"},
                {"text":"Edif.","dataIndex":"edificio"},
                {"text":"Casa","dataIndex":"casa"}
            ]
        },
        {"text":"Teléfonos","dataIndex":"telefonos","flex":4,"hidden":false},
        {"text":"Correo","dataIndex":"correo","flex":7,"hidden":false}
    ]
});