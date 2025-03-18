import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import { GuestBookEntry } from '@/types';
import { router } from '@inertiajs/react';

export default function GuestBookEntryCard({ entry }: { entry: GuestBookEntry }) {
    const deleteEntry = (id: number) => {
        if (confirm('Are you sure?')) {
            router.delete(route('guest-book.destroy', id));
        }
    };

    return (
        <Card>
            <CardHeader>
                <CardTitle>
                    {entry.user.name}
                    <small> - {new Date(entry.created_at).toLocaleString()}</small>
                </CardTitle>
            </CardHeader>
            <CardContent>
                <CardDescription>{entry.body}</CardDescription>
            </CardContent>
            <CardFooter>
                {(entry.can.update_entry || entry.can.delete_entry) && (
                    <p>
                        {entry.can.update_entry && <Button onClick={() => router.visit(route('guest-book.edit', [entry.id]))}>Edit</Button>}
                        &nbsp;
                        {entry.can.delete_entry && <Button onClick={() => deleteEntry(entry.id)}>Delete</Button>}
                    </p>
                )}
            </CardFooter>
        </Card>
    );
}
