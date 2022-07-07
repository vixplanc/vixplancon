class Table {
    private _rows: Array<{}>;
    private _columns: Array<{}>;

	constructor(rows: Array<{}>, columns: Array<{}>){
		this._rows = rows;
		this._columns = columns;
	}

	draw(): void{
		console.log("atualizar renderização da table")
	}

    public get columns(): Array<{}> {
        return this._columns;
    }
    public set columns(value: Array<{}>) {
        this._columns = value;
    }

	public get rows(): Array<{}> {
        return this._rows;
    }
    public set rows(value: Array<{}>) {
        this._rows = value;
    }
}

interface Column {
    name: string,
    title: string,
    props: {},
}

interface Row{
    data: Array<Column>,
    props: {}

}

