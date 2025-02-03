interface ChildItem {
    title: string,
    link: string,
}

export interface CatalogItem {
    title: string,
    link: string,
    key: string,
    value: string,
    childItems: ChildItem[]
}