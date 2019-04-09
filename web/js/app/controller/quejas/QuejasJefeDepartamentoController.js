
Ext.define('VIV.controller.quejas.QuejasJefeDepartamentoController', {
    extend: 'Ext.app.Controller',

    control: {
        /* Grid */
        'grid-respuesta': {
            edit: "editRespuestaEstado",
            resize: "resize",
            afterrender: "afterRenderRespuestaGrid",
            editColumnClick: "AddEditAccionesColumnClick"

        },
        'acciones-grid': {
            edit: "addEditAcciones",
            afterrender: "afterRenderAccionesGrid",
            removeColumnClick: "removeAccionesColumnClick"
        },
        'acciones-grid [name=add]': {
            click: "addAcciones"
        },
        'grid-quejas': {
            edit: "editEstado",
            resize: "resize",
            afterrender: "afterRenderGrid",
            itemcontextmenu: "itemcontextmenu"
        },
        'form-respuestas [text=Salvar]': {
            click: "addRespuesta"
        }
    },
    resize: function (grid){
        var centerpanel = Ext.getCmp('center-panel-id');
        grid.setHeight(centerpanel.getHeight());
    },
    afterRenderGrid: function (grid) {
        this.grid = grid;
        this.store = grid.getStore();
    },
    afterRenderRespuestaGrid: function (grid) {
        this.gridRespuesta = grid;
        this.storeRespuesta = grid.getStore();
    },
    afterRenderAccionesGrid: function (grid) {
        this.gridAcciones = grid;
        this.storeAcciones = grid.getStore();
    },
    /* MENU-QUEJAS */
    itemcontextmenu: function (view, record, item, index, e) {
        this.record = record;
        var me = this, menu = Ext.create('Ext.menu.Menu', {
            width: 200,
            closeAction: 'destroy',
            items: [{
                text: 'Respuesta <b>(QUEJA</b>)',
                iconCls: 'menu-respuestas',
                tooltip: 'Seguimiento a las Quejas (RESPUESTAS).',
                me: me,
                handler: me.respuestaQueja
            }]
        });
        menu.showAt(e.getXY());
        e.stopEvent();
    },
    /* RESPUESTAS */
    respuestaQueja: function (item) {
        var me = item.me,
            win = Ext.create('VIV.view.quejas.quejas.RespuestasForm'),
            form = win.down('form');

        form.down('[name=id]').setValue(me.record.get('respuesta-id'));
        form.down('[name=respuesta]').setValue(me.record.get('respuesta-respuesta'));
        form.down('[name=observacion]').setValue(me.record.get('respuesta-observacion'));
        win.show();
    },
    addRespuesta: function (btn) {
        var me = this, win = btn.up('window'), form = win.down('form');
        if (form.getForm().isValid()) {
            ajax(form.getForm().getValues());
        } else {
            this.message('Atención?', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', Ext.Msg.QUESTION);
        }
        function ajax (record) {
            Ext.Ajax.request({
                url: '../quejas/respuesta/add-edit',
                params: {
                    id: record.id,
                    respuesta: record.respuesta,
                    observacion: record.observacion,
                    queja: me.record.get('id')
                },
                success: function(response) {
                    if (response.responseText === '') {
                        me.store.reload();
                        win.close();
                    } else {
                        me.message('Error', response.responseText, Ext.Msg.ERROR);
                    }
                },
                failure: function(response){
                    me.message('Error', response.responseText, Ext.Msg.ERROR);
                }
            });
        }
    },
    /* EDIT-ESTADO */
    editEstado: function (editor, context, eOpts) {
        var me = this, record = context.record;
        Ext.Ajax.request({
            url: '../quejas/respuesta/estado',
            params: {
                id: record.get('respuesta-id'),
                estado: Ext.encode(record.get('estado'))
            },
            success: function () {
                me.store.reload();
                Ext.toast('Operación realizada exitosamente.', 'Actualización OK');
            },
            failure: function (response) {
                me.message('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
    editRespuestaEstado: function (editor, context) {
        var me = this, record = context.record;
        Ext.Ajax.request({
            url: '../quejas/respuesta/estado',
            params: {
                id: record.get('id'),
                estado: Ext.encode(record.get('estado'))
            },
            success: function () {
                me.store.reload();
                Ext.toast('Operación realizada exitosamente.', 'Actualización OK');
            },
            failure: function (response) {
                me.message('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
    /* ACCIONES */
    AddEditAccionesColumnClick: function (record) {
        this.win = Ext.create('Ext.window.Window', {
            title: 'Agregar/Editar Acciones',
            items: Ext.create('VIV.view.quejas.respuesta.AccionesGrid'),
            quejaRespuesta: record.get('id'),
            resizable: false,
            modal: true,
            width: 950
        });
        this.win.show();
    },
    removeAccionesColumnClick: function (record) {
        var me = this;
        Ext.Ajax.request({
            url: '../quejas/acciones/remove',
            params: {
                id: record.get('id')
            },
            success: function () {
                me.storeAcciones.load();
                me.storeRespuesta.load();
            },
            failure: function (response) {
                me.message('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
    addAcciones: function (btn) {
        var grid = btn.up('grid');
        grid.getStore().insert(0, {'id': 'add'});
        grid.cellEditing.startEditByPosition({
            row: 0,
            column: 1
        });
    },
    addEditAcciones: function (editor, context) {
        var me = this;
        Ext.Ajax.request({
            url: '../quejas/acciones/add-edit',
            params: {
                id: context.record.get('id'),
                fecha: context.record.get('fecha'),
                nombre: context.record.get('nombre'),
                descripcion: context.record.get('descripcion'),
                quejaRespuesta: me.win.quejaRespuesta
            },
            success: function (response) {
                if (response.responseText === "unique") {
                    me.message('Advertencia!!!', "Ya existe una \"Acción\" con este NOMBRE", Ext.Msg.WARNING);
                } else {
                    Ext.toast('Operación realizada exitosamente.', 'Actualización OK');
                }
                me.storeAcciones.load();
                me.storeRespuesta.load();
            },
            failure: function (response) {
                me.message('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
    /* MESSAGE */
    message: function (title, message, icon) {
        Ext.Msg.show({ title: title, message: message, buttons:Ext.MessageBox.OK, icon: icon });
    }
});