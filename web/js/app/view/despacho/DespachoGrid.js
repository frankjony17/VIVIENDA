
Ext.define('VIV.view.despacho.DespachoGrid', {
    extend: 'Ext.grid.Panel',
    xtype: 'grid-despacho',
    /* Config options */
    width: '100%',
    border: 1,
    selType: 'checkboxmodel',
    autoScroll: 1,
    scrollable: 'vertical',

    plugins: [{
        ptype: 'rowexpander',
        rowBodyTpl: ['{data}']
    },{
        ptype: 'cellediting',
        clicksToEdit: 1
    }],
    features: [{
        groupHeaderTpl: 'Estado: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    viewConfig: {
        getRowClass: function(record) {
            if(record.get('estado') === "<span style='color: red'><b>Sin Atender (OjO)</b></span>") {
                return 'despacho-color';
            }
        }
    },
    initComponent: function () {
        var me = this;
        this.stateEvents = [
            'editColumnClick'
        ];
        this.store = Ext.create('VIV.store.DespachoStore');
        /* Columns */
        this.columns = [
            {"xtype":"rownumberer","text":"No","width":45,"align":"center"},
            {"text":"Id","dataIndex":"id","flex":1,"hidden":true},
            {
                text: "Fecha",
                columns: [{
                    text: "Reporte",
                    dataIndex: "fecha_creacion",
                    width: 150
                },{
                    text: "Realización",
                    dataIndex: "fecha_culminacion",
                    editor: {
                        xtype: 'datefield',
                        format: 'Y-m-d',
                        editable: false
                    },
                    width: 150
                }]
            },
            { "text":"Cliente","dataIndex":"cliente","flex":4 },
            { "text":"Asunto","dataIndex":"asunto","flex": 7 },
            {
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
            { "text":"estado","dataIndex":"estado","hidden": true }
        ];
        this.tbar = [{
            text: 'Adicionar',
            tooltip: 'Adicionar despacho',
            iconCls: 'fa fa-plus',
            action: 'add'
        },{
            text: 'Eliminar',
            tooltip: 'Eliminar despacho',
            iconCls: 'fa fa-trash',
            action: 'remove'
        }];
        this.callParent(arguments);
    }
});