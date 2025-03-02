import { PLACEHOLDER_IMAGES } from "@/constants/dummyItems";

export function handleImageError(event: Event, index: number) {
  const target = event.target as HTMLImageElement;
  target.src = PLACEHOLDER_IMAGES[index % PLACEHOLDER_IMAGES.length]; // Choose a random placeholder
}
