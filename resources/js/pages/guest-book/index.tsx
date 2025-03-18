import GuestBookEntryCard from '@/components/guest-book-entry-card';
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/app-layout';
import { Auth, type BreadcrumbItem, Can, GuestBookEntry } from '@/types';
import { Head, router } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Guest Book',
        href: '/guest-book',
    },
];

export default function GuestBookEntries({ entries, can }: { auth: Auth; entries: GuestBookEntry[]; can: Can }) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Guest Book" />

            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                {can.create_entry && <Button onClick={() => router.visit(route('guest-book.create'))}>Add new entry</Button>}

                <div className="guest-book-entries mt-4">
                    {entries.length > 0 ? (
                        <div className="flex flex-col gap-4">
                            {entries.map((entry) => (
                                <GuestBookEntryCard key={entry.id} entry={entry} />
                            ))}
                        </div>
                    ) : (
                        <p className="mt-4 text-gray-500">No entries yet.</p>
                    )}
                </div>
            </div>
        </AppLayout>
    );
}
