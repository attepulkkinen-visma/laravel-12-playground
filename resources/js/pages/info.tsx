import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, usePoll } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Info',
        href: '/info',
    },
];

interface Quote {
    message: string;
    author: string;
}

export default function Info({ time, quote }: { time: string; quote: Quote }) {
    const { start, stop } = usePoll(
        2000,
        {
            onStart() {
                console.log('Polling request started');
            },
            onFinish() {
                console.log('Polling request finished');
            },
        },
        {
            autoStart: false,
        },
    );

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Info" />

            <div className="h-full p-3">
                <h1 className="mb-3 text-4xl">Hello, World!</h1>
                <h2 className="mb-3 text-3xl">{time}</h2>

                <div className="flex gap-3">
                    <Button onClick={start}>Start polling</Button>
                    <Button onClick={stop}>Stop polling</Button>
                </div>

                <figure className="mt-10 rounded bg-gray-500 p-5 text-white">
                    <blockquote>{quote.message}</blockquote>
                    <figcaption>&mdash; {quote.author}</figcaption>
                </figure>
            </div>
        </AppLayout>
    );
}
