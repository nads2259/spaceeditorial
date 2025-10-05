/* eslint-disable no-unused-vars */
export {}; // ensure this file is a module

declare global {
  interface Window {
    __frontendUserId?: number | null;
  }
}
