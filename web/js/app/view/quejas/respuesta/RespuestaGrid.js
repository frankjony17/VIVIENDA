
Ext.define('VIV.view.quejas.respuesta.RespuestaGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-respuesta',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',
    plugins: [{
        ptype: 'rowexpander',
        rowBodyTpl: ['{respuesta-data}']
    }],
    features: [{
        groupHeaderTpl: 'Fecha: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    store: Ext.create('VIV.store.RespuestaStore'),
    /* Columns */
    initComponent: function () {
        var me = this;
        this.stateEvents = [
            'editColumnClick'
        ];
        this.columns = [
            {"xtype":"rownumberer","text":"No","width":45,"align":"center"},
            {"text":"Id","dataIndex":"id","flex":1, "hidden":true},
            {"text":"Fecha","dataIndex":"fecha","flex":1, "hidden":true},
            {"text":"Cliente","dataIndex":"cliente","flex":10, "hidden":false},
            {"text":"Respuesta","dataIndex":"respuesta","flex":10, "hidden":false},
            {
                text: "Estado",
                align: 'center',
                xtype: 'checkcolumn',
                dataIndex: "estado",
                flex: 1,
                editor: {
                    xtype: 'checkbox'
                }
            },{
                xtype: 'actioncolumn',
                align: 'center',
                width: 30,
                items: [{
                    align: 'center',
                    iconCls: 'accion-row',
                    tooltip: 'Editar Acción.',
                    handler: function(grid, rowIndex){
                        me.fireEvent('editColumnClick', grid.getStore().getAt(rowIndex));
                    }
                }]
            },
            {"text":"Observación","dataIndex":"observacion", "hidden":true}
        ];

        this.callParent(arguments);
    }
});