import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, GuestBookEntry } from '@/types';
import { Head, useForm } from '@inertiajs/react';
import { LoaderCircle } from 'lucide-react';
import { FormEventHandler } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Guest Book',
        href: '/guest-book',
    },
    {
        title: 'New Entry',
        href: '/guest-book/create',
    },
];

export default function CreateGuestBookEntry({ entry }: { entry: GuestBookEntry }) {
    const { data, setData, errors, put, processing } = useForm({
        body: entry.body,
    });

    const submitEntry: FormEventHandler = (e) => {
        e.preventDefault();

        put(route('guest-book.update', entry.id));
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Guest Book - New Entry" />

            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <form onSubmit={submitEntry} className="space-y-6">
                    <div className="grid gap-2">
                        <Label htmlFor="body">Your message</Label>

                        <Input
                            id="body"
                            value={data.body}
                            onChange={(e) => setData('body', e.target.value)}
                            type="textarea"
                            className="mt-1 block w-full"
                            rows={10}
                        />

                        <InputError message={errors.body} />
                    </div>

                    <Button type="submit" className="mt-4 w-full" disabled={processing}>
                        {processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
                        Save
                    </Button>
                </form>
            </div>
        </AppLayout>
    );
}
