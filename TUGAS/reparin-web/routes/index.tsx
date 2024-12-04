import { Handlers, PageProps } from "$fresh/server.ts";
import { Service } from "../types/Service.ts";
import { getServices } from "../utils/api.ts";
import ServiceList from "../components/ServiceList.tsx";
import ServiceForm from "../islands/ServiceForm.tsx";

export const handler: Handlers<Service[]> = {
  async GET(_, ctx) {
    try {
      const response = await getServices();
      // Ensure we extract the correct data from the API response
      const services = response.data || [];
      return ctx.render(services);
    } catch (error) {
      console.error("Error fetching services:", error);
      return ctx.render([]);
    }
  },
};

export default function Home({ data: services }: PageProps<Service[]>) {
  return (
    <div className="container mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">Service Management</h1>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
        <ServiceList services={services} />
        <ServiceForm />
      </div>
    </div>
  );
}