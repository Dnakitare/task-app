import { APP } from '../App/app';

type HttpVerType = 'GET' | 'POST' | 'PUT' | 'DELETE';

export function makeHttpReq<TInput, TResponse>(
  endpoint: string,
  method: HttpVerType,
  input?: TInput
) {
  return new Promise<TResponse>(async (resolve, reject) => {
    try { 
      const res = await fetch(`${APP.apiBaseUrl}/${endpoint}`, {
        method:method,
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: input ? JSON.stringify(input) : undefined,
      });

      const data: TResponse = await res.json();

      if (!res.ok) {
        reject(data);
      }
      resolve(data);

    } catch (error) {
      reject(error);
    }
  });
}