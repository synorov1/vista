export interface IButton {
  title?: string;
  to: string;
}

export interface ISource {
  type: string;
  srcset: string;
  media: string;
}

export interface IImg {
  alt?: string;
  src: string;
  srcset?: string;
}

export interface IItem {
  title: string;
  img: IImg;
}

export interface IBaseList<T = IItem> {
  title: string;
  button: IButton;
  items: T[];
}
