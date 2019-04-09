
Ext.define('VIV.view.nomenclador.clasificacion.ClasificacionForm', {
    extend: 'Ext.window.Window',
    xtype: 'form-clasificacion',

    iconCls: '',
    layout: 'fit',
    width: 640,
    resizable: false,
    modal: true,

    initComponent: function () {
        var me = this;

        this.items = [{
            xtype: 'form',
            url: '../nomenclador/clasificacion/add-edit',
            padding: '10 10 10 10',
            frame: false,
            fieldDefaults: {
                anchor: '100%',
                allowBlank: false,
                labelAlign: 'top'
            },
            items:[{
                xtype: 'textfield',
                    fieldLabel: 'Nombre',
                    emptyText: 'Nombre',
                    name: 'nombre',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 46,
                    allowBlank: false,
                    flex: 1,
                    afterLabelTextTpl: ['<span style="color:red; font-weight:bold" data-qtip="Required">*</span>']
            },{
                xtype: 'textfield',
                    fieldLabel: 'Descripcion',
                    emptyText: 'Descripcion',
                    name: 'descripcion',
                    /*maskRe: MASKRe,
                    regex: REGEx,*/
                    maxLength: 126,
                    allowBlank: true,
                    flex: 1,
                    afterLabelTextTpl: false
            },{
                xtype: 'hiddenfield',
                name: 'id'
            }]
        }];
        this.buttons = [{
            text: me.btnText,
            iconCls: 'fa fa-check'
        },{
            text: 'Cancelar',
            iconCls: 'fa fa-times',
            handler: function() {
                me.close();
            }
        }];
        this.callParent(arguments);
    }
});