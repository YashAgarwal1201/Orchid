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

export type ModeOfPayment = "upi" | "card";

export interface RegisterFormData {
  username: string;
  email: string;
  password: string;
  cpassword: string;
}

export type ToastSeverity = "success" | "info" | "warn" | "error";
