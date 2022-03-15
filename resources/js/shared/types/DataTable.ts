export interface DataTableThead {
    value?: string;
    sort?: 'none' | 'asc' | 'desc'; // Sorting
    columnId?: string; // sort field, e.g. 'id'
    rowspan?: number;
    colspan?: number;
    slot?: string;
}

export interface DataTableTbody {
    field?: string; // Data field name
    fn?: (data: any) => string; // Simple data processing
    colClass?: string; // The class name of the <col> element
    fixed?: 'left' | 'right'; // Set column position for fixed cell
    width?: number; // Set column width for fixed cell
    slot?: string;
}

export interface DataTableTfoot {
    field?: string;
    fnName?: 'count' | 'sum' | 'avg' | 'max' | 'min'; // Frequently-used statistical method
    fn?: (data: any) => string; // Simple data processing for result
    slot?: string; // Custom slot for footer cell
}
