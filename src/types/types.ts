// types.ts
export interface Product {
  productId: string;
  productTitle: string;
  productImage: string;
  productDescription: string;
  productPrice: number;
  productRating: number;
  productCategory: string;
  estimatedDelivery: string;
}

export type SelectFilterOption = {
  name: string;
  code: string;
};
